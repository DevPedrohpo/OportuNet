<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        // Obter os dados do usuário (exemplo)
        $usuario = [
            'nome' => 'Nome do Usuário',
            'email' => 'email@exemplo.com',
        ];

        // Carregar a view home.php e passar os dados do usuário
        return view('home', ['usuario' => $usuario]);
    }

    public function salvarCurriculo()
    {
        // Processar o upload da foto de perfil (opcional)
        $fotoPerfil = $this->request->getFile('foto_perfil');
        $nomeFotoPerfil = null;

        if ($fotoPerfil && $fotoPerfil->isValid() && !$fotoPerfil->hasMoved()) {
            $nomeFotoPerfil = $fotoPerfil->getRandomName();
            $fotoPerfil->move(WRITEPATH . 'uploads', $nomeFotoPerfil);
        }

        // Processar os dados do formulário de informações do currículo
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $telefone = $this->request->getPost('telefone');
        $endereco = $this->request->getPost('endereco');

        // Salvar os dados no banco de dados (exemplo)
        // ...

        // Redirecionar para a tela inicial
        return redirect()->to('/home');
    }

    public function uploadCv()
    {
        // Processar o upload do arquivo do CV
        $arquivoCv = $this->request->getFile('arquivo_cv');

        if ($arquivoCv->isValid() && !$arquivoCv->hasMoved()) {
            $novoNome = $arquivoCv->getRandomName();
            $arquivoCv->move(WRITEPATH . 'uploads', $novoNome);

            // Salvar o nome do arquivo no banco de dados (exemplo)
            // ...

            // Redirecionar para a tela inicial
            return redirect()->to('/home');
        } else {
            // Lidar com erros de upload
            // ...
            return redirect()->to('/home');
        }
    }

    public function removerArquivoCv()
    {
        // Exemplo de lógica para remover o arquivo de CV
        $arquivoCv = $this->request->getPost('arquivo_cv');
        if ($arquivoCv && file_exists(WRITEPATH . 'uploads/' . $arquivoCv)) {
            unlink(WRITEPATH . 'uploads/' . $arquivoCv);
            // Atualizar o banco de dados para remover a referência ao arquivo
            // ...
        }
        return redirect()->to('/home');
    }

    public function removerFotoPerfil()
    {
        // Exemplo de lógica para remover a foto de perfil
        $fotoPerfil = $this->request->getPost('foto_perfil');
        if ($fotoPerfil && file_exists(WRITEPATH . 'uploads/' . $fotoPerfil)) {
            unlink(WRITEPATH . 'uploads/' . $fotoPerfil);
            // Atualizar o banco de dados para remover a referência ao arquivo
            // ...
        }
        return redirect()->to('/home');
    }
}