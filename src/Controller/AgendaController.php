<?php 

namespace Agenda\Controller;

use Agenda\Model\Agenda; 


class AgendaController extends Controller
{

    private $agenda;

    public function __construct()
    {
        $this->agenda = new Agenda();
    }

    public function create()
    {
        $titulo = $this->getParam("titulo");
        $descricao = $this->getParam("descricao");
        $data = $this->getParam("data");
        $status = $this->getParam("status");
        
        if(empty($titulo) || empty($descricao) || empty($data)){
            return $this->return(true, "Erro, é obrigátorio ser passado todos os parâmetro (titulo, descricao, data)");
        }

        $result = $this->agenda->create($titulo, $descricao, $data, $status);

        if($result){
            return $this->return(false, "Agendado com sucesso");
        } else {
            return $this->return(true, "Erro ao salvar o agendamento, tente novamente");
        }
        

    }

    public function readAll()
    {
        echo $this->return(false, "", $this->agenda->readAll());
    }

}