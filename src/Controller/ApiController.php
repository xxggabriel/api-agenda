<?php 

namespace Agenda\Controller;

use Agenda\Model\Api; 


class ApiController extends Controller{

    private $api;

    public function __construct()
    {
        $this->api = new Api();
        
    }

    public function create()
    {
        $user = $this->getParam("user_id");
        $status = $this->getParam("status") == "" ?  1 : $this->getParam("status");
        
        if(empty($user)){
            return $this->return(true, "Erro, é obrigátorio ser passado todos os parâmetro (user, [status])");
        }

        if(!$this->api->readUser($user)){
            return $this->return(true, "Erro, user não existe");
        }

        $api_key =  md5(uniqid($user, true));

        $result = $this->api->create($user,$api_key, $status);

        if($result){
            return $this->return(false, "Api gerada com sucesso", [
                "user" => $user,
                "api_key" => $api_key,
                "status" => $status,
            ]);
        } else {
            return $this->return(true, "Erro ao criar a api_key, tente novamente");
        }    
    }

    public function validateUser($user)
    {
        return empty($this->api->readUser($user)) ? false : true;
    }

    public function readAll()
    {
        return $this->return(false, "", $this->api->readAll());
    }

    public function readById($id)
    {
        return $this->return(false, "", $this->api->readById($id));
    }

    public function update($id)
    {
        $user = $this->getParam("user_id");
        $status = $this->getParam("status") == "" ?  1 : $this->getParam("status");
        

        if(empty($user)){
            return $this->return(true, "Erro, é obrigátorio ser passado todos os parâmetro (user, [status])");
        }

        if(!$this->api->readUser($user)){
            return $this->return(true, "Erro, user não existe");
        }


        $result = $this->api->update($id, $user, $status);

        if($result){
            return $this->return(false, "Api atualizada com sucesso");
        } else {
            return $this->return(true, "Erro ao atualizar a api_key, tente novamente");
        }
    }


    public function delete($id)
    {

        if(!$this->api->readById($id)){
            return $this->return(true, "Erro, id não existe");
        }
        $result = $this->api->delete($id);

        if($result){
            return $this->return(false, "Api apagada com sucesso");
        } else {
            return $this->return(true, "Erro ao apagar a api_key, tente novamente");
        }
    }



}