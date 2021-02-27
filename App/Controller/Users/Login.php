<?php

namespace App\Controller\Users;

use App\Model\Users\UserCheck;

class Login{

    public $email;
    public $password;

    public function __construct( $data )
    {
        echo 'loging in...';
        
        $this->email = $data['email'];
        $this->password = $data['password'];

        $this->CheckUserExists();
    }

    public function CheckUserExists(): bool
    {
        $valid = false;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $valid = ( new UserCheck )->WithEmail( $this->email );
        } else {
            dd('not a valid email');
        }
        if ($valid) {
            return true;
        }
        return false;
    }

    public function CheckUserToken(): bool
    {
        $valid = false;
        $valid = ( new UserCheck )->Token( $this->password );
        
        if ($valid) {
            return true;
        }
    }

}