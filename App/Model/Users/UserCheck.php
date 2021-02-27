<?php

namespace App\Model\Users;

use App\Model\DB;
use r as rethink;
use App\Security\Hash;

class UserCheck extends User{
 
    public function NewInstall(): bool
    {

        if($this->DB->table->table('users')->count()->run($this->DB->db) === 0.0){
            return true;
        }
        return false;
    }

    public function WithEmail( $email ): bool
    {
        $exists 
        = 
        $this->DB->table
        ->table('users')
        ->filter(array('email' => $email))
        ->count()
        ->run($this->DB->db);

        if ($email && $exists !== 0.0) {
            return true;
        };
        return false;
    }

    public function StoredToken( $email ): string
    {
        $token = $this->DB->table
        ->table('users')
        ->get($email)
        ->run($this->DB->db);
        $token = $token['password'];
        return $token;
    }

    public function TokenCheck( $token, $password ): bool
    {

        $token = ( new Hash )->decrypt( $token );
        
        if( $token == $password ){
            return true;
        };
        return false;
    }
}