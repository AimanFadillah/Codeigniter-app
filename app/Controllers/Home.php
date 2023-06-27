<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use Config\Services;

class Home extends BaseController
{   
    protected $SiswaModel;
    public function __construct(){
        $this->SiswaModel = new SiswaModel();
    }

    public function index(){
        $dataSiswa = $this->SiswaModel->ambilSiswa();
        return view("home",[
            "dataSiswa" => $dataSiswa
        ]);
    }

    public function create () {
        // dd(session()->getFlashdata("validation"));
        return view("create",[
            "validation" => session()->getFlashdata("validation"),
        ]);
    }

    public function store () {
        if(!$this->validate([
            "name" => [
                "rules" => "required|is_unique[siswa.name]",
                "errors" => [
                    "required" => "Nama Harus Terisi",
                    "is_unique" => "Nama kamu Sudah Terpakai"
                ]
            ],
            "kelas" => "required",
            "img" => "uploaded[img]|max_size[img,3024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]",
        ])){
            return redirect()->to("/home/create")->withInput()->with("validation",$this->validator->getErrors());
        }

        $img = $this->request->getFile("img");
        
        $img->move("img");

        $this->SiswaModel->save([
            "name" => $this->request->getVar("name"),
            "kelas" => $this->request->getVar("kelas"),
            "img" => $img->getName(),
        ]);

        session()->setFlashdata("pesan","Siswa baru berhasil ditambahkan");

        return redirect()->to("/home");
    }

    public function show($name){
        $siswa = $this->SiswaModel->ambilSiswa($name);

        if($siswa == null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Page Not Found");
        }

        return view("show",[
            "siswa" => $siswa,
        ]);
    }

    public function edit($name){
        $siswa = $this->SiswaModel->ambilSiswa($name);

        return view("edit",[
            "siswa" => $siswa,
            "validation" => session()->getFlashdata("validation"),
        ]);
    }

    public function update ($id) {

        if(!$this->validate([
            "name" => [
                "rules" => $this->request->getVar("name") !== $this->request->getVar("old_name") ? "required|is_unique[siswa.name]" : "required",
                "errors" => [
                    "required" => "Nama Harus Terisi",
                    "is_unique" => "Nama kamu Sudah Terpakai"
                ]
            ],
            "kelas" => "required"
        ])){
            $validation = Services::validation();

            return redirect()->to("/home/edit/" . $this->request->getVar("old_name"))->withInput()->with("validation",$validation);
        }

        $this->SiswaModel->save([
            "id" => $id,
            "name" => $this->request->getVar("name"),
            "kelas" => $this->request->getVar("kelas"),
        ]);

        session()->setFlashdata("pesan","Siswa baru berhasil diubah");

        return redirect()->to("/home");

    }

    public function destroy ($id) {
        $this->SiswaModel->delete($id);
        return redirect()->to("/home")->with("pesan","berhasil menghapus");
    }
}




