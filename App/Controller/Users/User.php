<?php

namespace App\Controller\Users;

use App\Model\Users\UserGet;


class User{



    public function GetName(){

        $user_arr = (new UserGet)->Data( ( new Cookie )->UserLoggedIn() );
        return $user_arr['name'];
    }

    public function GetEmail(){

        $user_arr = (new UserGet)->Data( ( new Cookie )->UserLoggedIn() );
        return $user_arr['email'];
    }

    public function CheckAuthentication(){
        if( !( new Cookie )->CheckCookie() ){
            $host  = $_SERVER['HTTP_HOST'];
            header("Location: http://$host/login");
        }
    }
}