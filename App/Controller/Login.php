<?php

namespace App\Controller;

use App\Model\Users\UserCheck;

class Login{
    
    public function __construct(){

        $this->CheckIfThereAreanyUsers();
        $this->render();
    }

    public function CheckIfThereAreanyUsers(): bool
    {

        return ( new UserCheck )->NewInstall();
    }

    public function render(){
        
        if( $this->CheckIfThereAreanyUsers() ){
            require_once( dirname(__FILE__, 2) . '/View/Signup.php' );
            return;
        }
        require_once( dirname(__FILE__, 2) . '/View/Login.php' );
        return;
    }
}