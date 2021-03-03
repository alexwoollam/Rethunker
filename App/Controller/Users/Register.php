<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller\Users; 

use App\Model\Users\UserNew;
use App\Security\Hash;
use App\Controller\Mail;
use App\Helpers\Log;

class Register extends Login{

    public $PasswordHash;

    public function User()
    {
        $this->PasswordHash = $this->HashPassword();
        $this->RegisterUser();
    }

    public function RegisterUser()
    {
        
        try{
            ( new UserNew )->RegisterEmail( $this->email, $this->PasswordHash, $this->name );
            
            $welcome_email = [
                'to' => $this->email, 
                'name' => $this->name , 
                'subject' => 'Welcome to ReCMS', 
                'body' => 'Welcome to ReCMS ' . $this->name, 
            ];
            ( new Mail($welcome_email) )->Send();
            
        } catch( \Exception $err) {
            ( new Log )->error( 'Error Registering User: '.$err );
        }
    }

    public function HashPassword(){

        return ( new Hash )->encrypt( $this->password );
    }
}