<?php

namespace App\Models;
  
use CodeIgniter\Model;
  
class EmendasModel extends Model{
    protected $table = 'congresso_emendas';
	protected $primarykey = 'cod_eme';
    protected $allowedFields = ['menu', 'cod_eve', 'cod_cad', 'cod_usu', 'nrparagrafo', 'emendas', 'status', 'pala_inicio', 'pala_fim','tipo', 'texto_sub', 'grupo', 'percen', 'apr_rep', 'dt_inc', 'dt_alt'];
}