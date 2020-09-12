<?php 

$app = new \Slim\App();

$app->group('/api/v1/', function (App $app) {
    $app->get('/', '\Agenda\Controller\AgendaController:home');
    $app->post('/', '\Agenda\Controller\AgendaController:home');
    $app->put('/', '\Agenda\Controller\AgendaController:home');
    $app->delete('/', '\Agenda\Controller\AgendaController:home');
})->add( new \Agenda\Controller\AutenticacaoApiMiddleware() );
