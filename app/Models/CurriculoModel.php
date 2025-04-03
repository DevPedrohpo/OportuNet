<?php

namespace App\Models;

use CodeIgniter\Model;

class CurriculoModel extends Model
{
    protected $table = 'curriculos'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id'; // Chave primária da tabela
    protected $allowedFields = ['nome', 'email', 'pretensao_salarial']; // Campos permitidos para inserção e atualização
}