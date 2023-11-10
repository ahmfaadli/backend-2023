<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthControler extends Controller
{
    //Membuat fitur register
    public function register(Request $request) {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        //Menginsert data ke table user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully'
        ];

        //Mengirim response JSON
        return response()->json($data, 200); 
    }   
}
