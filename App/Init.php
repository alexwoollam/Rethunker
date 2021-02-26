<?php

namespace App;

use App\Model\StartUp;
use App\Router\Page;
use App\Controller\Login;

class Init{

    public function __construct()
    {
    
        new StartUp();
        ( new Page() )->Routes();

    }
}

new Init();
