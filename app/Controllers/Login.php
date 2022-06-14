<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UsuarioModel;

class Login extends BaseController
{
    protected $session;

    public function index()
    {
        return view('/login');
    }
    
    public function auth()
    {
        $session = session();
        $this->usuarioModel = new UsuarioModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $this->usuarioModel->where('username', $username)->first();
        
        if($data){
            $hash = $data['password'];
        
            if(password_verify($password, $hash)){
                $ses_data = [
                    'cod_usu'       => $data['id'],
                    'user_name'     => $data['username'],
                    'user_nome'     => $data['nome'],              
                    'user_nivel'     => $data['nivel'],
                    'cod_eve'      => $data['cod_eve'],
                    'isLoggedIn'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            }else{
                $session->setFlashdata('msg', 'Senha inválida.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Usuário inválido.');
            return redirect()->to('/login');
        }
    }

    public function logout() 
    {
        session()->destroy();
        return redirect()->to('/');
    }
}