<?php 

namespace Agenda\Model; 

use Agenda\Model\DB\Sql;

class Api extends Sql{


    public function create($user, $api_key, $status = 1)
    {
        return $this->query("INSERT INTO api (api_key, user, status) VALUES (:api_key, :user, :status)", [
            ":api_key"  => $api_key,
            ":user" => $user,
            ":status" => $status
        ]);
    }

    public function readUser($user)
    {
        return $this->select("SELECT * FROM api WHERE user = :user", [
            ":user" => $user
        ]);
    }

    public function readKey($api_key)
    {
        return $this->select("SELECT * FROM api WHERE api_key = :api_key", [
            ":api_key" => $api_key
        ])[0];
    }

    public function readAll()
    {
        return $this->select("SELECT * FROM api");
    }

    public function readById($id)
    {
        return $this->select("SELECT * FROM api WHERE id = :id", [
            ":id"  => $id
        ]);
    }

    public function update($id, $user, $status = 1)
    {
        return $this->query("UPDATE api SET user = :user, status = :status WHERE id = :id", [
            ":id"           => $id,
            ":user"       => $user,
            ":status"    => $status,
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM api WHERE id = :id", [
            ":id"  => $id
        ]);
    }

}