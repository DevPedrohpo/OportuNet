<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'cpf', 'senha', 'tipo_conta'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;   
}
