<?php

namespace App\Controllers;

use App\Models\EmendasModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->emendasModel = new EmendasModel();
    }

    public function index()
    {   $title = "Home";
        $datas = $this->emendasModel->find();
        echo view('layout/header', ['title' => $title]);
        echo view('home', ['datas'  => $datas]);
        echo view('layout/footer');
    }
}
