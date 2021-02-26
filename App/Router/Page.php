<?php
namespace App\Router;

class Page extends Route {

    public function Routes(){
        $this->router->get('/about', function() { 
            echo 'About returned';
         });

        $this->router->get('/', function() { 
            echo 'Home returned';
         });

        
    }

}