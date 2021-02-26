<?php
namespace App\Router;

class Page extends Route {

    public function Routes(){
        $this->router->get('/([a-z0-9-]+)', function($id) use ($router) { 
            new \App\Controller\Standard( $id );
         });

        $this->router->get('/', function() { 
            new \App\Controller\Home( $id );
         });

        
    }

}