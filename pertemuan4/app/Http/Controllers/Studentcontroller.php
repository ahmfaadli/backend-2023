<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menggunakan model Student untuk select data
        $students = Student::all();
        
        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];
        //menembalikan data dalam bentuk json
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = [
        'nama' => $request->nama,
        'nim' => $request->nim,
        'email' => $request->email,
        'jurusan' => $request->jurusan
       ];

        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];
        
        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        //
        $student = Student::find($id);

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student->update($input);

        $data = [
            'message' => 'Student is updated succesfully',
            'data' => $student
        ];
            return response()->json($data, 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $students = Student::find($id);

        $student->delete();

        $data = [
            'message' => 'Student is deleted succesfully',
            'data' => $student
        ];

            return response()->json($response, 404);
    }
}
