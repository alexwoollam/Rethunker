<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller\Users;

class Logout{

    public function User(){
        ( new Cookie )->KillCookie();
        $host  = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/");
    }
}