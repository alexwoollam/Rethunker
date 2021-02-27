<?php

namespace App\Controller\Users; 

use App\Model\Users\UserNew;

class Register extends Login{

    public function User()
    {
        $this->RegisterUser();
    }

    public function RegisterUser()
    {
        var_dump('registering...');
        try{
            ( new UserNew )->RegisterEmail( $this->email );
        } catch(Exception $err) {
            dd('could register.');
        }
        

    }
}