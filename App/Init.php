<?php

namespace App;

use App\Model\StartUp;
use App\Router\Page;
use App\Controller\Login;

class Init{

    public function __construct()
    {
    
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        new StartUp();
        ( new Page() )->Routes();

    }
}

new Init();
