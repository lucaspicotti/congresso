<?php

namespace App\Controllers;

use App\Models\EventosModel;
use App\Models\NucleoModel;
use App\Models\UsuarioModel;

class Configurar extends BaseController
{
    public function __construct()
    {
        $this->nucleoModel = new NucleoModel();
        $this->eventosModel =  new EventosModel();
        $this->usuarioModel = new UsuarioModel();    
    }

    public function criarUser() 
    {   $title = "Criar usuário";
        $nucleos = $this->nucleoModel->find();
        $eventos = $this->eventosModel->select('id, evento')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_criarUser', ['nucleos' => $nucleos, 'eventos' => $eventos]);
        echo view('layout/footer');
    }

    public function save() 
    {
        $data_inc = date('Y/m/d H:i:s');
        $dados = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nome' => $this->request->getPost('nome'),
            'nucleo' => $this->request->getPost('nucleo'),  
            'celular' => $this->request->getPost('celular'),  
            'email' => $this->request->getPost('email'),
            'cod_eve' => $this->request->getPost('cod_eve'),
            'setor' => $this->request->getPost('setor'),
            'nivel' => $this->request->getPost('nivel'),
            'data_inc' => $data_inc
        ];

        if($this->usuarioModel->save($dados)){
            session()->setFlashdata('msg', 'Usuário salvo com sucesso.'); 
            return redirect()->back();
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível salvar o usuário.'); 
            return redirect()->back();
        }
    }

    public function listUser() 
    {   
        $title = "Lista de usuários";
        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_listUser', ['dados' => $this->usuarioModel->find()]);
        echo view('layout/footer');
    }

    public function editUser()
    {
        $title = "Editar usuário";
        $usuario = $this->request->getPost('id');
        $dados = $this->usuarioModel->where('id', $usuario)->find();

        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_editUser', [  'dados'   => $dados,
                                        'nucleos' => $this->nucleoModel->find(),
                                        'eventos' =>$this->eventosModel->select('id, evento')->find()]);
        echo view('layout/footer');
    }

    public function update($id) 
    {
        $data_alt = date('Y/m/d H:i:s');

        if($this->request->getPost('password') !== "") {
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        } else {
            $dados = $this->usuarioModel->where('id', $id)->find();

            foreach($dados as $dado) {
                $password = $dado['password'];  
            }
        }

        $dados = [
            'username' => $this->request->getPost('username'),
            'password' => $password,
            'nome' => $this->request->getPost('nome'),
            'nucleo' => $this->request->getPost('nucleo'),
            'celular' => $this->request->getPost('celular'),
            'email' => $this->request->getPost('email'),
            'cod_eve' => $this->request->getPost('cod_eve'),
            'setor' => $this->request->getPost('setor'),
            'nivel' => $this->request->getPost('nivel'),
            'data_alt' => $data_alt
        ];

        if($this->usuarioModel->update($id, $dados)){
            session()->setFlashdata('msg', 'Usuário editado com sucesso.'); 
            return redirect()->to('home');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível editar o usuário.'); 
            return redirect()->to('home');
        }
    }

    public function criarEvento() 
    {
        $title = "Criar evento";
        $nucleos = $this->nucleoModel->find();
        
        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_criarEvento', ['nucleos' => $nucleos]);
        echo view('layout/footer');
    }

    public function saveEvento()
    {
        $dt_inc = date('Y/m/d H:i:s');
        $dados = [
            'evento' => $this->request->getPost('evento'),
            'ini_evento' => $this->request->getPost('ini_evento'),
            'fim_evento' => $this->request->getPost('fim_evento'),
            'nucleo' => $this->request->getPost('nucleo'),
            'instrucoes' => $this->request->getPost('instrucoes'),
            'dt_inc' => $dt_inc
        ];

        if($this->eventosModel->save($dados)){
            session()->setFlashdata('msg', 'Evento salvo com sucesso.'); 
            return redirect()->back();
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível salvar o Evento.'); 
            return redirect()->back();
        }
    }

    public function listEvento() 
    {   
        $title = "Lista de eventos";
        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_listEvento', ['dados' => $this->eventosModel->find()]);
        echo view('layout/footer');
    }

    public function editEvento() 
    {
        $title = "Editar evento";
        $evento = $this->request->getPost('id');
        $dados = $this->eventosModel->where('id', $evento)->find();

        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_editEvento', [  'dados'   => $dados,
                                        'nucleos' => $this->nucleoModel->find()]);
        echo view('layout/footer');
    }

    public function updateEvento($id) 
    {
        $dt_alt = date('Y/m/d H:i:s');

        $dados = [
            'evento' => $this->request->getPost('evento'),
            'ini_evento' => $this->request->getPost('ini_evento'),
            'fim_evento' => $this->request->getPost('fim_evento'),
            'nucleo' => $this->request->getPost('nucleo'),
            'instrucoes' => $this->request->getPost('instrucoes'),
            '$dt_alt' => $dt_alt
        ];

        if($this->eventosModel->update($id, $dados)){
            session()->setFlashdata('msg', 'Usuário editado com sucesso.'); 
            return redirect()->to('home');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível editar o usuário.'); 
            return redirect()->to('home');
        }
    }

}