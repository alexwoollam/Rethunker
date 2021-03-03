<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Users;

class UserGet extends User{

    public function Data( $email ): object
    {
        $token = 
        $this->DB->table->table('users')
        ->get($email)
        ->run($this->DB->db);

        return $token;
    }
}