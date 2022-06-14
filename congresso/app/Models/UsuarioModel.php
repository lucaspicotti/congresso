<?php

namespace App\Models;
  
use CodeIgniter\Model;
  
class UsuarioModel extends Model{
    protected $table = 'congresso_user';
	protected $primarykey = 'id';
    protected $allowedFields = ['cod_eve', 'username', 'password', 'nome', 'tipo', 'nucleo', 'setor', 'nivel', 'email', 'cpf', 'data_inc', 'data_alt', 'celular'];
}