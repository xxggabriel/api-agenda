<?php 

namespace Agenda\Model; 

use Agenda\Model\DB\Sql;

class Agenda extends Sql
{

    public function create($titulo, $descricao, $data, $status = 1)
    {
        return $this->query("INSERT INTO agenda (titulo, descricao, data, status) VALUES (:titulo, :descricao, :data, :status)", [
            ":titulo"       => $titulo,
            ":descricao"    => $descricao,
            ":data"         => $data,
            ":status"       => $status
        ]);
    }
    
    public function readAll()
    {
        return $this->select("SELECT * FROM agenda");
    }

    public function readById($id)
    {
        return $this->select("SELECT * FROM agenda WHERE id = :id", [
            ":id"  => $id
        ]);
    }

    public function update($id, $titulo, $descricao, $data, $status = 1)
    {
        return $this->query("UPDATE agenda SET titulo = :titulo, descricao = :descricao, data = :data, status = :status WHERE id = :id", [
            ":id"           => $id,
            ":titulo"       => $titulo,
            ":descricao"    => $descricao,
            ":data"         => $data,
            ":status"       => $status
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM agenda WHERE id = :id", [
            ":id"  => $id
        ]);
    }

}