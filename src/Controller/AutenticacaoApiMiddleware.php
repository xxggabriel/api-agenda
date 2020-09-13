<?php 

namespace Agenda\Controller;

use Agenda\Model\Api;
use Slim\Middleware;

class AutenticacaoApiMiddleware extends Middleware {

    public function call()
    {
        $app = $this->app;
        $this->next->call();
        $res = $app->response;
        $body = $res->getBody();

        $api = new \Agenda\Model\Api();
        $controller = new \Agenda\Controller\Controller();
        
        
        if(empty($app->request->params("api_key")) || empty($app->request->params("user"))){
           $body = $controller->return(true, "Erro, api_key ou user não foi informada.");
        } else {

            $result = $api->readKey($app->request->params("api_key"));
            
            if(empty($result)){
               $body = $controller->return(true, "Erro de autenticação, verifique sua api_key se está correta.");  
            } else {
                
                if($result["user"] != $app->request->params("user")){
                    $body = $controller->return(true, "Erro ao se autenticar, verifique sua user  se está correta.");
                }
            }
        }

        return $res->setBody($body);
    }
    
}


