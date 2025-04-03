<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('/', 'AuthController::login');

// Rotas para a tela inicial (home)
$routes->get('/home', 'HomeController::index'); // Exibe a tela inicial
$routes->post('/home/salvar_curriculo', 'HomeController::salvarCurriculo'); // Salva as informações do currículo
$routes->post('/home/upload_cv', 'HomeController::uploadCv'); // Faz o upload do CV
$routes->get('/admin', 'AdminController::index'); // Certifique-se de que esta linha existe