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
            'cpf' => '123.456.789-00',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Masculino',
            'estado_civil' => 'Solteiro',
            'escolaridade' => 'Superior Completo',
            'cursos_especializacoes' => 'Cursos...',
            'experiencia_profissional' => 'Experiência...',
            'pretensao_salarial' => 3000.00,
            'caminho_cv' => 'arquivo.pdf',
        ];

        // Carregar a view home.php e passar os dados do usuário
        return view('home', ['usuario' => $usuario]);
    }

    public function salvarCurriculo()
    {
        // Processar os dados do formulário de informações do currículo
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $cpf = $this->request->getPost('cpf');
        $dataNascimento = $this->request->getPost('data_nascimento');
        $sexo = $this->request->getPost('sexo');
        $estadoCivil = $this->request->getPost('estado_civil');
        $escolaridade = $this->request->getPost('escolaridade');
        $cursosEspecializacoes = $this->request->getPost('cursos_especializacoes');
        $experienciaProfissional = $this->request->getPost('experiencia_profissional');
        $pretensaoSalarial = $this->request->getPost('pretensao_salarial');

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
}