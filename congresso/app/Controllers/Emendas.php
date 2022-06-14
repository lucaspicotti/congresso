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
        echo view('emendas/emendas', ['dados' => $dados]);
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

    public function selectEmendas()
    {
        $title = "Selecionar emendas";
        $dados = $this->cadernoModel->select('nr_paragrafo')->find();
        
        echo view('layout/header', ['title' => $title]);
        echo view('emendas/emendas_select', ['dados' => $dados]);
        echo view('layout/footer');
    }

    public function listEmendas() 
    {   
        $title = "Lista de emendas";
        $user_nivel = $_SESSION['user_nivel'];
        $cod_usu = $_SESSION['cod_usu'];
        $npr = $this->request->getPost('npr');

        if($user_nivel == 1){
            $dados = $this->emendasModel->where('nrparagrafo', $npr)->join('congresso_combo as CC', 'CC.cod_com = 4','left')->select('congresso_emendas.*')->select('CC.descri')->find();
        }elseif($user_nivel == 3) {
            $dados = $this->emendasModel->where('congresso_emendas.cod_usu', $cod_usu)->where('congresso_emendas.nrparagrafo', $npr)->join('congresso_combo as CC', 'CC.cod_com = 4','left')->select('congresso_emendas.*')->select('CC.descri')->find();
        }

        echo view('layout/header', ['title' => $title]);
        echo view('emendas/emendas_list', ['dados' => $dados,
                                            'paragrafos'  => $this->cadernoModel->select('nr_paragrafo')->find()]);
        echo view('layout/footer');
    }

    public function editEmendas()
    {
        $title = "Editar emenda";
        $id = $this->request->getPost('id');
        $dados = $this->emendasModel->where('congresso_emendas.id', $id)->join('congresso_combo as CC', 'CC.cod_com = 4','left')->select('congresso_emendas.*')->select('CC.descri')->find();
        

        echo view('layout/header', ['title' => $title]);
        echo view('emendas/emendas_edit', ['dados'=> $dados]);
        echo view('layout/footer');
    }

    public function emendasUpdate($id) 
    {
        $data_alt = date('Y/m/d H:i:s');
        $dados = [
            'pala_inicio' => $this->request->getPost('pala_inicio'),
            'emendas' => $this->request->getPost('emendas'),
            'dt_alt' => $data_alt
        ];

        if($this->emendasModel->update($id, $dados)){
            session()->setFlashdata('msg', 'Emenda editada com sucesso.'); 
            return redirect()->to('selectEmendas');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível editar a emenda.'); 
            return redirect()->to('selectEmendas');
        }
    }
}
