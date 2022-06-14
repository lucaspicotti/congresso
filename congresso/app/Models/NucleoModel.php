<?php

namespace App\Models;
  
use CodeIgniter\Model;
  
class NucleoModel extends Model{
    protected $table = 'nucleo_caixa';
    protected $allowedFields = ['codigo','nucleo'];
}