<?php

namespace App\Models;
  
use CodeIgniter\Model;
  
class EventosModel extends Model{
    protected $table = 'congresso_eventos';
	protected $primarykey = 'id';
    protected $allowedFields = ['evento', 'ini_evento', 'fim_evento', 'nucleo', 'datacad', 'instrucoes', 'logo_evento', 'dt_inc', 'dt_alt'];
}