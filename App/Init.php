<?php

namespace App;

use App\Model\StartUp;
use App\Controller\Login;

class Init{

    public function __construct()
    {
    
        new StartUp();
        new Login();
    }
}

new Init();
