<?php

namespace App\Controller\Users;

use App\Model\Users\UserGet;


class User{



    public function GetName(){

        $user_arr = (new UserGet)->Data( ( new Cookie )->UserLoggedIn() );
        return $user_arr['name'];
    }
}