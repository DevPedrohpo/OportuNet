<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index()
    {
        helper(['form']); // Carrega o helper 'form'
        return view('auth/login');
    }

    public function login()
    {
        // Lógica de login
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email_login');
            $senha = $this->request->getVar('senha_login');

            $usuarioModel = new \App\Models\UserModels();
            $usuario = $usuarioModel->where('email_login', $email)->first();

            if ($usuario) {
                if (password_verify($senha, $usuario['senha_login'])) {
                    $session = session();
                    $session->set('usuario_id', $usuario['id']);
                    return redirect()->to('/home'); // Redireciona para a página inicial
                } else {
                    $data['error'] = 'Senha incorreta.';
                }
            } else {
                $data['error'] = 'Email não encontrado.';
            }
        }

        return view('auth/login', $data);
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email_cadastro'),
            'cpf' => preg_replace('/\D/', '', $this->request->getPost('cpf_cadastro')), // Remove a mascara do CPF
            'senha' => $this->request->getPost('senha_cadastro'),
            'tipo_conta' => $this->request->getPost('tipo_conta'),
        ];

        $rules = [
            'nome' => 'required',
            'email' => [
                    'rules' => 'required|valid_email|is_unique[usuarios.email]',
                    'errors' => [
                        'is_unique'   => 'Este email já está cadastrado.'
                    ]
                ],
            'senha' => 'required|min_length[6]',
            'tipo_conta' => 'required|in_list[admin,candidato]',
            'cpf' => [
                'rules' => 'required|exact_length[11]|is_unique[usuarios.cpf]',
                'errors' => [
                    'is_unique'   => 'Este CPF já está cadastrado.'
                ]
            ],
        ];

        if (!$validation->setRules($rules)->run($data)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode('<br>', $validation->getErrors())
            ]);
        }

        // Salvar usuário
        $usuarioModel = new \App\Models\UserModels();
        $usuarioModel->save([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'cpf' => $data['cpf'], // Salva apenas numeros do CPF
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT),
            'role'  => $data['tipo_conta'] == 'admin' ? 1 : 0
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Cadastro realizado com sucesso!'
        ]);
    }


}