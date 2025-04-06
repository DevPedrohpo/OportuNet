<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rota principal para exibir a página de login e cadastro
$routes->get('/', 'AuthController::index');

// Rotas separadas para login e cadastro
$routes->post('/auth/login', 'AuthController::login'); // Rota para processar o login
$routes->post('/auth/register', 'AuthController::register');

// Rotas para a tela inicial (home)
$routes->get('/home', 'HomeController::index'); // Exibe a tela inicial
$routes->post('/home/salvar_curriculo', 'HomeController::salvarCurriculo'); // Salva as informações do currículo
$routes->post('/home/upload_cv', 'HomeController::uploadCv'); // Faz o upload do CV

// Rota para o painel do administrador
$routes->get('/admin', 'AdminController::index'); // Certifique-se de que esta linha existe