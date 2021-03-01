<?php

namespace App\Router;

use App\Controller\Api\Pages\Get;
use App\Controller\Api\Endpoints;

class Api extends Route{

    public function Routes(){

        $route = $this->router;

        $route->get('/api/page/([a-z0-9-]+)', function($id) use ($router) {
            ( new Get($id) )->WithId();
        });

        $route->get('/api/pages', function() {
            ( new Get('all') )->All();
        });

        $route->get('/api', function() {
            new Endpoints();
        });

        $route->run();

    }
}