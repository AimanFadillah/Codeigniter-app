<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index () {
        return $this->SetupLayout("about",[
            "nama" => "aiman",
        ]);    
    }
}
