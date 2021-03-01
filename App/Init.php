<?php

namespace App;

use App\Model\StartUp;
use App\Router\Route;
use App\Controller\Mail;
use App\Controller\Login;
use App\Controller\Users\Cookie;

class Init{

    public function __construct()
    {
    
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        new StartUp();
        ( new Cookie() )->CheckCookie();
        ( new Route() )->Routes();

    }
}

new Init();
