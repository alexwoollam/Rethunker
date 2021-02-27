<?php

namespace App\Model\Users;

class UserNew extends User{

    public function RegisterEmail( string $email, string $password ): bool
    {
        
        if((new UserCheck)->WithEmail($email) === false) {
            $user = [
                'id'=>$email,
                'email'=>$email,
                'password'=>$password,
            ];
            $this->DB->table->table('users')->insert($user)->run($this->DB->db);
            dd( 'User added' );
            return true;
        }
        dd( 'user exists' );
        return false;
    }
}