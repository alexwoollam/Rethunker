<?php

namespace App\Model\Users;

class UserNew extends User{

    public function RegisterEmail( string $email ): bool
    {
        
        if((new UserCheck)->WithEmail($email) === false) {
            $email = ['email'=>$email];
            $this->DB->table->table('users')->insert($email)->run($this->DB->db);
            dd( 'User added' );
            return true;
        }
        dd( 'user exists' );
        return false;
    }
}