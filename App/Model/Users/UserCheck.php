<?php

namespace App\Model\Users;

use App\Model\DB;
use r as rethink;

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

    public function Token( $token ): bool
    {
        if( 'this' == 'that' ){
            return true;
        };
        return false;
    }
}