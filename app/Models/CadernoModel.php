<?php

namespace App\Models;
  
use CodeIgniter\Model;
  
class CadernoModel extends Model
{
    protected $table = 'congresso_caderno';
	protected $primarykey = 'cod_cad';
    protected $allowedFields = ['cod_cad', 'titulo', 'orde', 'nr_paragrafo', 'evento', 'paragrafo', 'dt_inc', 'dt_alt', 'img_01', 'img_02', 'img_03'];
}