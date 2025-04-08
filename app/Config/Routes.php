<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Página de login/cadastro
$routes->get('/', 'AuthController::index');

// Autenticação
$routes->post('/auth/login', 'AuthController::login');
$routes->post('/auth/register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');

// Rotas protegidas
$routes->group('', ['filter' => 'auth'], function($routes){
    // Página inicial do candidato
    $routes->get('/home', 'HomeController::index');
    $routes->post('/home/salvar_curriculo', 'HomeController::salvar_curriculo');

    // Página do administrador
    $routes->get('/admin', 'AdminController::index');
});

$routes->get('cvs/(:any)', 'AdminController::downloadCv/$1');
