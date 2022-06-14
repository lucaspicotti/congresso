<?php

namespace App\Controllers;

use App\Models\CadernoModel;
use App\Models\EmendasModel;

class Emendas extends BaseController
{
    public function __construct()
    {   
        session();
        $this->emendasModel = new EmendasModel();
        $this->cadernoModel = new CadernoModel();
        
    }

    public function index()
    {   $title = "Emendas";
        $dados = $this->cadernoModel->select('nr_paragrafo, menu')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('emendas', ['dados' => $dados]);
        echo view('layout/footer');
    }

    public function saveEmendas()
    {
        $dt_inc = date('Y/m/d H:i:s');
        $dados = [
            'cod_eve' => $_SESSION['cod_eve'],
            'cod_usu' => $_SESSION['cod_usu'],
            'nrparagrafo' => $this->request->getPost('nrparagrafo'),
            'emendas' => $this->request->getPost('emendas'),
            'pala_inicio' => $this->request->getPost('pala_inicio'),
            'tipo' => $this->request->getPost('tipo'),
            'texto_sub' => $this->request->getPost('texto_sub'),
            'dt_inc' => $dt_inc
        ];

        if($this->emendasModel->save($dados)){
            session()->setFlashdata('msg', 'Emenda salva com sucesso.'); 
            return redirect()->to('emendas');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível salvar a emenda.'); 
            return redirect()->to('emendas');
        }
    }
}
