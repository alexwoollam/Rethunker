<?php

namespace App\Router;

use Bramus\Router\Router;

class Route{

        public $router;

        public function __construct(){

            $this->router = new Router();
        }

        public function __destruct(){
            $this->router->run();
        }
}