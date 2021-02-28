<?php

namespace App\Model\Users;

class UserGet extends User{

    public function Data( $email ){
        $token = 
        $this->DB->table->table('users')
        ->get($email)
        ->run($this->DB->db);

        return $token;
    }
}