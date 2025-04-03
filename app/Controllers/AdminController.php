<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        // Carregar a view admin.php sem dados dinâmicos
        return view('admin');
    }
}