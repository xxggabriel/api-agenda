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
    $app->get('/:id', '\Agenda\Controller\AgendaController:readById');
    $app->put('/:id', '\Agenda\Controller\AgendaController:update');
    $app->delete('/:id', '\Agenda\Controller\AgendaController:delete');
});

$app->group('/api/v1/api', function () use($app){
    $app->get('/', '\Agenda\Controller\ApiController:readAll');
    $app->post('/', '\Agenda\Controller\ApiController:create');
    $app->get('/:id', '\Agenda\Controller\ApiController:readById');
    $app->put('/:id', '\Agenda\Controller\ApiController:update');
    $app->delete('/:id', '\Agenda\Controller\ApiController:delete');
});


$app->run();


