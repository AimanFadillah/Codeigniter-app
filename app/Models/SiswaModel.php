<?php
namespace App\Models; 

use CodeIgniter\Model; 

class SiswaModel extends Model  {
    protected $table = "siswa";
    protected $useTimestamps = true;
    protected $allowedFields = ['name','kelas',"img"];

    public function ambilSiswa ($name = false) {
        if($name == false){
            return $this->findAll();
        }

        return $this->where(["name" => $name])->first();
    }

}