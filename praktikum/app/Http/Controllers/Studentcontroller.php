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
        
        //jika data kosong maka kirim status code 204
        if($students->isEmpty()){
            $data = [
                'message' => 'Resource Is Empty'
        ];
        //menembalikan data dalam bentuk json
            return response()->json($data, 200);
     }

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        //Mengembalikan data dalam bentuk json
        return response()->json($data, 200);
    
    }

    public function store(Request $request)
    {
        // Validasi data request
        $request->validate([
            'nama' => "required",
            'nim' => "required",
            'email' => "required|email",
            'jurusan' => "required"
        ]);

       $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
       ];

        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student
        ];
        
        return response()->json($data, 201);
    }

    public function update(Request $request , $id)
    {
        //
        $student = Student::find($id);

        if (!$student) {
            $data = [
                "messaga" => 'Data not found'
            ];

            return response()->json($data, 404);
        }

        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
       ]);

        $data = [
            'message' => 'Student is updated succesfully',
            'data' => $student
        ];
            return response()->json($data, 200);
    }


    public function destroy($id)
    {
        //
        $student = Student::find($id);

        if(!$student){
            $data = [
                'message' => 'Student not dound'
            ];

            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'message' => 'Student is deleted succesfully',
            'data' => $student
        ];

            return response()->json($response, 200);
}

public function show ($id)
{
    $student = Student::find($id);

    if (!student){
        $data = [

            "message" => " Data not found"
        ];
        

        return response()->json($data, 404);
    }

    $data - [
        "message" => "Show detail resource",
        "data" => $student
    ];

    return response()->json($data, 200);
    }
}
