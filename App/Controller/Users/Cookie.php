<?php

namespace App\Controller\Users;

use App\Security\Hash;

class Cookie{

    public $user_is_logged_in = false;
    public $logged_in_user = null;
    
    public function AddCookie( $user ){

        if( !$_COOKIE["ReCMS_User"] ){
            $cookie_dough = ( new Hash )->encrypt( $user );
            setcookie("ReCMS_User", $cookie_dough, time()+3600);
        }
    }

    public function UserIsLoggedIn(){

        $this->CheckCookie();
        return $this->user_is_logged_in;
    }

    public function UserLoggedIn(){

        $this->CheckCookie();
        return $this->logged_in_user;
    }

    public function CheckCookie(){

        if( $_COOKIE["ReCMS_User"] ){
            $cookie_dough = ( new Hash )->decrypt( $_COOKIE["ReCMS_User"] );
            $this->logged_in_user = $cookie_dough;
            $this->user_is_logged_in = true;
            return true;
        } 
        return false;
    }

    public function KillCookie(){
        
        if (isset($_COOKIE['ReCMS_User'])) {
            unset($_COOKIE['ReCMS_User']); 
            setcookie('ReCMS_User', null, -1, '/'); 
            return true;
        } else {
            return false;
        }
    }


}