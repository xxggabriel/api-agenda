<?php 
header('Content-Type: application/json');
use \Slim\Slim;

$config = [
    'settings' => [
        'displayErrorDetails' => true,

    ],
];
$app = new Slim($config);

$app->add(new \Agenda\Controller\AutenticacaoApiMiddleware());

$app->group('/api/v1/agenda', function () use($app){
    $app->get('/', '\Agenda\Controller\AgendaController:readAll');
    $app->post('/', '\Agenda\Controller\AgendaController:create');
    $app->put('/', '\Agenda\Controller\AgendaController:home');
    $app->delete('/', '\Agenda\Controller\AgendaController:home');
});

$app->group('/api/v1/api', function () use($app){
    $app->get('/', '\Agenda\Controller\AgendaController:getAgenda');
    $app->post('/', '\Agenda\Controller\AgendaController:home');
    $app->put('/', '\Agenda\Controller\AgendaController:home');
    $app->delete('/', '\Agenda\Controller\AgendaController:home');
});


$app->run();


