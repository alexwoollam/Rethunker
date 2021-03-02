<?php

namespace App\Router;

use Bramus\Router\Router;

class Route{

        public $router;

        public function __construct(){

            $this->router = new Router();
        }

        public function Routes(){
      
            ( new Api )->Routes();
            ( new Admin )->Routes();
            ( new Page )->Routes();
        }
}