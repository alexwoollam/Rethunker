<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Router;

use App\Controller\Api\Pages\Get;
use App\Controller\Api\Pages\Set;
use App\Controller\Api\Endpoints;

class Api extends Route{

    public function Routes(){

        $route = $this->router;

        $route->get('/api/page/([a-z0-9-]+)', function($id) use ($router) {
            ( new Get($id) )->WithId();
        });

        $route->post('/api/page/new/', function($data=null) {
            ( new Set() )->NewPage($_POST);
        });

        $route->post('/api/page/update/', function($data=null) {
            (new Set())->Update($_POST);
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