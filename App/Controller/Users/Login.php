<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller\Users;

use App\Model\Users\UserCheck;
use App\Controller\Users\Cookie;

class Login{

    public $email;
    public $password;
    public $name;

    public $new_registration = false;
    public $email_exists;
    public $authenticate = false;

    public function __construct( $data )
    {   

        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->name = $data['name'];

        if( $data['registration'] === 'true' ){
            $this->new_registration = true;
        }

        $this->email_exists = $this->CheckUserExists();
        if( $this->email_exists ){
            $stored_token = $this->GetStoredToken();
            $this->authenticate = $this->CheckUserToken( $stored_token );
        };

        $data = [
            'email' => $this->email_exists,
            'sent_email' => $this->email,
            'authenticated' => $this->authenticate
        ];

        if ($this->authenticate) {
            ( new Cookie )->AddCookie( $this->email );
            $host  = $_SERVER['HTTP_HOST'];
            header("Location: http://$host/dashboard");
        }
        if( $this->new_registration ){
            ( new Cookie )->AddCookie( $this->email );
            $host  = $_SERVER['HTTP_HOST'];
            header("Location: http://$host/dashboard");
        }

        new \App\Controller\Login( 'login', $data );        

    }

    public function CheckUserExists(): bool
    {

        $valid = false;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $valid = ( new UserCheck )->WithEmail( $this->email );
        }
        if ($valid) {
            return true;
        }
        return false;
    }

    public function GetStoredToken(): string
    {

        return ( new UserCheck )->StoredToken( $this->email );
    }

    public function CheckUserToken( $stored_token ): bool
    {

        $valid = false;
        $valid = ( new UserCheck )->TokenCheck( $stored_token, $this->password );
        
        if ($valid) {
            return true;
        }
        return false;
    }
}