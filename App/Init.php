<?php

namespace App;

use App\Model\StartUp;
use App\Router\Admin;
use App\Router\Page;
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
        ( new Admin() )->Routes();
        ( new Page() )->Routes();
        

    }
}

new Init();
