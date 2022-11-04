<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Utils\View;
use \Includes\Environment;
use \Database\Database;
use \App\Http\Middleware\Queue as MiddlewareQueue;

//CARREGA VARIÁVEIS DE AMBIENTE
Environment::load(__DIR__ . '/../');

//DEFINE AS CONFIGURAÇÕES DE BANCO DE DADOS
Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT')
);

//DEFINE A CONSTANTE DE URL DO PROJETO
define('URL', getenv('URL'));

//DEFINE O VALOR PADRÃO DAS VARÁVEIS
View::init([
    'URL' => URL
]);

//DEFINE O MAPEAMENTO DE MIDDLEWARES
MiddlewareQueue::setMap([
    'maintenance' => \App\Http\Middleware\Maintenance::class
]);

//DEFINE O MAPEAMENTO DE MIDDLEWARES PADRÕES (EXECUTADOS EM TODAS AS ROTAS)
MiddlewareQueue::setDefault([
    'maintenance'
]);