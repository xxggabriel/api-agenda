<?php 

namespace Agenda\Controller;

use Agenda\Model\Api; 


class ApiController extends Controller{

    private $api;

    public function __construct()
    {
        $this->api = new Api();
        
    }

    public function create($request, $response, $args)
    {
        if(!$this->validateUser($args["user"])){
            return $this->return(true, "Usuário não existe!");
        }
        
        $user = $args["user"];
        $key =  md5(uniqid($user, true));

        if(!$this->api->create($key, $user)){
            return $this->return(true, "Erro ao salvar a key, tente novamente");
        }

        $this->return(false, "", [
            "api_key" => $key
        ]);
    }

    public function validateUser($user)
    {
        return empty($this->api->readUser($user)) ? false : true;
    }


    public function delete($key)
    {
        
    }



}