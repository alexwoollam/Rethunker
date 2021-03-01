<?php

namespace App\Controller;

use App\Model\Users\UserCheck;

class Login extends Page{

    public function CheckIfThereAreanyUsers(): bool
    {

        return ( new UserCheck )->NewInstall();
    }

    public function Return( $id, $post ){
        
        $no_users = $this->CheckIfThereAreanyUsers();
        require_once( dirname(__FILE__, 2) . '/View/Login.php' );
        return;
    }
}