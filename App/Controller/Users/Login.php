<?php

namespace App\Controller\Users;

use App\Model\Users\UserCheck;

class Login{

    public $email;
    public $password;

    public function __construct( $data )
    {   
        $this->email = $data['email'];
        $this->password = $data['password'];

        if( $this->CheckUserExists() ){
            $stored_token = $this->GetStoredToken();
            $this->CheckUserToken( $stored_token );
        };
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