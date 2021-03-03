<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Users;

class UserNew extends User{

    public function RegisterEmail( string $email, string $password, string $name ): bool
    {
        
        if((new UserCheck)->WithEmail($email) === false) {
            $user = [
                'id'=>$email,
                'email'=>$email,
                'name'=>$name,
                'password'=>$password,
            ];
            $this->DB->table->table('users')->insert($user)->run($this->DB->db);
            return true;
        }
        return false;
    }
}