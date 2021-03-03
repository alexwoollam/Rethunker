<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Router;

use App\Controller\Users\Login;

class Admin extends Route {

    public function Routes(){

        $route = $this->router;
        
        $route->get('/admin', function() {
            return new \App\Controller\Login( 'login' );
        });

        $route->run();
    }

}