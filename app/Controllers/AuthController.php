<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function login()
    {
        helper(['form']);

        $email = $this->request->getPost('email_login');
        $senha = $this->request->getPost('senha_login');

        $usuarioModel = new UserModel();
        $usuario = $usuarioModel->where('email', $email)->first();

        if (!$usuario) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'E-mail não encontrado.'
            ]);
        }

        if (!password_verify($senha, $usuario['senha'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Senha incorreta.'
            ]);
        }

        // Salva sessão com o tipo correto
        session()->set([
            'usuario_id'   => $usuario['id'],
            'usuario_nome' => $usuario['nome'],
            'tipo_conta'   => $usuario['tipo_conta'],
            'logado'       => true
        ]);

        // Redirecionamento baseado no tipo de conta
        if ($usuario['tipo_conta'] === 'Administrador') {
            return $this->response->setJSON([
                'success' => true,
                'redirect' => base_url('admin')
            ]);
        } else {
            $idCriptografado = base64_encode($usuario['id']);
            return $this->response->setJSON([
                'success' => true,
                'redirect' => base_url('home?id=' . $idCriptografado)
            ]);
        }
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email_cadastro'),
            'cpf' => preg_replace('/\D/', '', $this->request->getPost('cpf_cadastro')),
            'senha' => $this->request->getPost('senha_cadastro'),
            'tipo_conta' => $this->request->getPost('tipo_conta'),
        ];

        $rules = [
            'nome' => 'required',
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuarios_login.email]',
                'errors' => ['is_unique' => 'Este email já está cadastrado.']
            ],
            'senha' => 'required|min_length[6]',
            'tipo_conta' => 'required|in_list[Administrador, Candidato]',
            'cpf' => [
                'rules' => 'required|exact_length[11]|is_unique[usuarios_login.cpf]',
                'errors' => ['is_unique' => 'Este CPF já está cadastrado.']
            ],
        ];

        if (!$validation->setRules($rules)->run($data)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode('<br>', $validation->getErrors())
            ]);
        }

        // Salva no banco
        $usuarioModel = new UserModel();
        $usuarioModel->save([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT),
            'tipo_conta' => $data['tipo_conta']
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Cadastro realizado com sucesso!'
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Logout realizado com sucesso!');
    }
}
