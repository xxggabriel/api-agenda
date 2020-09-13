<?php 

namespace Agenda\Model; 

use Agenda\Model\DB\Sql;

class Api extends Sql{


    public function create($key, $user)
    {
        return $this->query("INSERT INTO api (api_key, user) VALUES (:api_key, :user)", [
            ":api_key"  => $key,
            ":user" => $user
        ]);
    }

    public function readUser($user)
    {
        return $this->select("SELECT * FROM api WHERE user = :user", [
            ":user"  => $user
        ]);
    }

    public function readKey($key)
    {
        return $this->select("SELECT * FROM api WHERE api_key = :api_key", [
            ":api_key"  => $key
        ])[0];
    }

    public function delete($key)
    {
        return $this->query("DELETE FROM api WHERE api_key = :api_key", [
            ":api_key"  => $key
        ]);
    }

}