<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'usuarios_login';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nome',
        'email',
        'senha',
        'cpf',
        'tipo_conta'
    ];
    protected $useTimestamps = false;
}
