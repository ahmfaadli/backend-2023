<?php
#Membuat class animal

class Animal
{
    public $animals;

    public function __construct($data) {
        $this->animals = $data;
    }

    public function index() {

        foreach ($this->animals as $animal) {
            echo "$animal <br>";
        }
        return $this;
    }

    public function store($data) {

        array_push($this->animals, $data);

        return $this;
    }

    public function update($index, $data) {
        $this->animals[$index] = $data;

        return $this;
    }

    public function destroy($index) {

        unset($this->animals[$index]);

        return $this;
    }
}

$animal = new Animal(["Ayam", "Ikan",]);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menampilkan hewan baru <br>";
$animal->store('burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";

