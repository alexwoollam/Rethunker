<?php

namespace App\Controller\Users;

class Logout{

    public function User(){
        ( new Cookie )->KillCookie();
        $host  = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/");
    }
}