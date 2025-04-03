<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            // Validação
            $rules = [
                'email' => 'required|valid_email',
                'senha' => 'required|min_length[6]',
            ];

            if ($this->validate($rules)) {
                // Lógica de login
                $email = $this->request->getVar('email');
                $senha = $this->request->getVar('senha');

                $usuarioModel = new \App\Models\UserModels();
                $usuario = $usuarioModel->where('email', $email)->first();

                if ($usuario) {
                    if (password_verify($senha, $usuario['senha'])) {
                        $session = session();
                        $session->set('usuario_id', $usuario['id']);
                        return redirect()->to('/curriculos'); // Redireciona para a página de currículos
                    } else {
                        $data['error'] = 'Senha incorreta.';
                    }
                } else {
                    $data['error'] = 'Email não encontrado.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/login', $data);
    }
}