<?php

namespace App\Controllers;

use App\Models\EventosModel;
use App\Models\NucleoModel;
use App\Models\UsuarioModel;
use App\Models\CadernoModel;

class Configurar extends BaseController
{
    public function __construct()
    {
        $this->nucleoModel = new NucleoModel();
        $this->eventosModel =  new EventosModel();
        $this->usuarioModel = new UsuarioModel();    
        $this->cadernoModel = new CadernoModel();
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
            return redirect()->to('criarUser');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível salvar o usuário.'); 
            return redirect()->to('criarUser');
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
        $dados = $this->usuarioModel->where('congresso_user.id', $usuario)->join('nucleo', 'congresso_user.nucleo = nucleo.codigo', 'left')->join('congresso_eventos', 'congresso_user.cod_eve = congresso_eventos.id', 'left')->select('congresso_user.*')->select('nucleo.nucleo as nomeNucleo')->select('congresso_eventos.evento')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_editUser', [  'dados'   => $dados,
                                        'nucleos' => $this->nucleoModel->find(),
                                        'eventos' =>$this->eventosModel->select('id, evento')->find()]);
        echo view('layout/footer');
    }

    public function updateUser($id) 
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
            return redirect()->to('listUser');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível editar o usuário.'); 
            return redirect()->to('listUser');
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
            return redirect()->to('criarEvento');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível salvar o Evento.'); 
            return redirect()->to('criarEvento');
        }
    }

    public function listEvento() 
    {   
        $dados = $this->eventosModel->find();
        $title = "Lista de eventos";
        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_listEvento', ['dados' => $dados]);
        echo view('layout/footer');
    }

    public function editEvento() 
    {
        $title = "Editar evento";
        $evento = $this->request->getPost('id');
        $dados = $this->eventosModel->where('id', $evento)->join('nucleo', 'congresso_eventos.nucleo = nucleo.codigo', 'left')->select('congresso_eventos.*')->select('nucleo.nucleo as nomeNucleo')->find();
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
            return redirect()->to('listEvento');
        }else {
            session()->setFlashdata('error_msg', 'Não foi possível editar o usuário.'); 
            return redirect()->to('listEvento');
        }
    }

    public function incluirCaderno() 
    {
        $title = "Incluir caderno";
        $eventos = $this->eventosModel->find();
        
        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_incluirCaderno', ['eventos' => $eventos]);
        echo view('layout/footer');
    }

    public function saveCaderno()
    {
        $dt_inc = date('Y/m/d H:i:s');
        dd($this->request->getPost());
    }

    public function pesquisaCaderno() 
    {
        $title = "Editar caderno";
        $eventos = $this->eventosModel->select('id, evento')->find();
        $nrp = $this->cadernoModel->select('nr_paragrafo')->find();
        
        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_pesquisaCaderno', ['eventos' => $eventos,
                                                        'paragrafos' => $nrp]);
        echo view('layout/footer');
    }

    public function editCaderno() 
    {
        $evento = $this->request->getPost('evento');
        $nr_paragrafo = $this->request->getPost('nr_paragrafo');
        $title = "Editar caderno";
        $dados = $this->cadernoModel->where('congresso_caderno.evento', $evento)->where('congresso_caderno.nr_paragrafo', $nr_paragrafo)->join('congresso_eventos', 'congresso_caderno.evento = congresso_eventos.id', 'left')->select('congresso_caderno.*')->select('congresso_eventos.evento as nomeEvento')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('configuracoes/config_editCaderno', ['dados' => $dados]);
        echo view('layout/footer');
    }

    public function updateCaderno() 
    {
        dd($this->request->getPost());
    }

}