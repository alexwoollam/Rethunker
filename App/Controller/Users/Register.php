<?php

namespace App\Controller\Users; 

use App\Model\Users\UserNew;
use App\Security\Hash;

class Register extends Login{

    public $PasswordHash;

    public function User()
    {
        $this->PasswordHash = $this->HashPassword();
        $this->RegisterUser();
    }

    public function RegisterUser()
    {
        var_dump('registering...');

        try{
            ( new UserNew )->RegisterEmail( $this->email, $this->PasswordHash );
        } catch(Exception $err) {
            dd('could register.');
        }
    }

    public function HashPassword(){
        return ( new Hash )->encrypt( $this->password );
    }
}