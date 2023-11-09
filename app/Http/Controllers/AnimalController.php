<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //method g
    public $animals = ['kucing', 'ayam', 'ikan'];


    public function index (){
        echo "Menampilkan data animals";


        foreach($this->animals as $animal){
            echo "- $animal <br>";
        }
    }

    public function store(Request $request){
        echo "Menambahkan hewan baru <br>";

        array_push($this->animals, $request->animal);

        $this->index();
    }
    
    public function destroy($id)
    {
        echo "Mengapus data hewan id $id <br>";

        unset($this->animals[$id]);

        $this->index();
    }
}
