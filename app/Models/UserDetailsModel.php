<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDetailsModel extends Model
{
    protected $table            = 'usuarios_detalhes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'user_id',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'escolaridade',
        'cursos_especializacoes',
        'experiencia_profissional',
        'pretensao_salarial',
        'caminho_cv',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;

    protected $returnType = 'array';
}
