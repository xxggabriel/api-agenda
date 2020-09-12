<?php 

namespace Agenda\Controller;

class AutenticacaoApiMiddleware {

    public function __invoke($request, $response, $next)
    {
        // Verifica o login

        return $response;
    }

}