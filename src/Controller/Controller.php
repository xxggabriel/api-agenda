<?php 

namespace Agenda\Controller;

use Slim\Slim;

class Controller {

    public function return($erro = false, $message = "", $parameters = [])
    {
        $data = [];
        foreach ($parameters as $key => $value) {
            $data[$key] = $value;
        }
        $result = [
            "error"     => $erro,
            "message"   => $message,
            "data"      => $data
        ]; 

        echo json_encode($result);
        
    }

    public function getParam($param)
    {
        $slim = new Slim();
        return filter_var($slim->request->params($param), FILTER_SANITIZE_STRING);
        
    }
    

}