<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserDetailsModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        $loginModel = new UserModel();
        $detailsModel = new UserDetailsModel();

        $users = $loginModel
        ->select('usuarios_login.nome, usuarios_login.email, usuarios_detalhes.pretensao_salarial, usuarios_detalhes.caminho_cv')
        ->join('usuarios_detalhes', 'usuarios_login.id = usuarios_detalhes.user_id')
        ->findAll();
        return view('admin', ['usuarios' => $users]);
    }

    public function downloadCv($caminhoCv)
    {

        $filePath = FCPATH . $caminhoCv; // Caminho completo do arquivo

        if (file_exists($filePath)) {

            // Extrai apenas o nome do arquivo
            $fileName = basename($filePath);

            // Define os cabeçalhos para download
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Limpa o buffer de saída
            ob_clean();
            flush();

            readfile($filePath);
            exit;
        } else {
            return redirect()->to('/admin')->with('error', 'Arquivo não encontrado.');
        }
    }
}