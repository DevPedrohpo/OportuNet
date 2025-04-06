<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Database\Config;

class Teste extends Controller
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();

            echo "✅ Conexão com MySQL bem-sucedida!";
        } catch (\Exception $e) {
            echo "❌ Erro na conexão: " . $e->getMessage();
        }
    }
}
