<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserDetailsModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function index()
    {    
        $userId = $this->_getUserId();
    
        // Verifica se o usuário está logado
        $loginModel = new UserModel();
        $dadosLogin = $loginModel->find($userId);
    
        if (!$dadosLogin) {
            return redirect()->to('/auth/login')->with('error', 'Usuário não encontrado.');
        }
    
        // Pegando o model de detalhes do usuário
        $usuarioModel = new UserDetailsModel();
        $usuarioDetalhes = $usuarioModel->where('user_id', $userId)->first();
    
        // Juntar os dados (com fallback para não dar erro se for nulo)
        $usuario = array_merge(
            $dadosLogin ?? [],
            $usuarioDetalhes ?? []
        );
    
        return view('home', ['usuario' => $usuario]);
    }

    public function salvar_curriculo()
    {
        $userId = $this->_getUserId($this->request->getPost('user_id'));

        // Modelos
        $loginModel = new UserModel();
        $detalhesModel = new UserDetailsModel();

        // Atualiza nome do usuário
        $loginModel->update($userId, [
            'nome' => $this->request->getPost('nome')
        ]);

        // Processa arquivo do currículo
        $cv = $this->request->getFile('arquivo_cv');
        $cvPath = null;

        if ($cv && $cv->isValid() && !$cv->hasMoved()) {
            // Obtém o nome original do arquivo
            $originalName = pathinfo($cv->getClientName(), PATHINFO_BASENAME);
            
            // Remove caracteres indesejados e previne injeção de caminhos
            $sanitizedName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $originalName);
            
            // Adiciona um timestamp para evitar sobrescrição
            $uniqueName = time() . '_' . $sanitizedName; 
            $cvPath = 'uploads/' . $uniqueName; 
            
            // Move o arquivo para o diretório especificado
            $cv->move(ROOTPATH . 'public/uploads', $uniqueName);
        }

        // Dados do formulário
        $dados = [
            'user_id' => $userId,
            'estado_civil' => $this->request->getPost('estado_civil'),
            'sexo' => $this->request->getPost('sexo'),
            'data_nascimento' => $this->request->getPost('data_nascimento'),
            'escolaridade' => $this->request->getPost('escolaridade'),
            'pretensao_salarial' => $this->request->getPost('pretensao_salarial'),
            'cursos_especializacoes' => $this->request->getPost('cursos_especializacoes'),
            'experiencia_profissional' => $this->request->getPost('experiencia_profissional'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($cvPath) {
            $dados['caminho_cv'] = $cvPath; // ← ajustado aqui o nome correto da coluna
        }

        // Verifica se já existe registro
        $detalhes = $detalhesModel->where('user_id', $userId)->first();

        if ($detalhes) {
            $detalhesModel->update($detalhes['id'], $dados);
        } else {
            $dados['created_at'] = date('Y-m-d H:i:s');
            $detalhesModel->insert($dados);
        }

        // Retorna a resposta com o nome do arquivo salvo (se tiver)
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Currículo salvo com sucesso!',
            'arquivo_cv' => $cvPath
        ]);
    }

    protected function _getUserId($userId = null)
    {
        try {
            if ($userId !== null) {
                return base64_decode($userId);
            }
            return base64_decode($_GET['id']);
        } catch (\Exception $e) {
            return redirect()->to('/auth/login')->with('error', 'ID inválido.');
        }
    }
    
}