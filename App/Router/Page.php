<?php
namespace App\Router;

use App\Controller\Users\Login;
use App\Controller\Users\Register;

class Page extends Route {

    public function Routes(){

        $route = $this->router;

        $route->get('/login', function() {
            new \App\Controller\Login( 'login' );
        });

        $route->post('/login', function($data = null) {
            new Login($_POST);
        });

        $route->get('/register', function() {
            new \App\Controller\Register( 'register' );
        });

        $route->post('/register', function($data = null) {
            ( new Register($_POST) )->User();
        });

        $route->get('/([a-z0-9-]+)', function($id) use ($router) { 
            new \App\Controller\Standard( $id );
        });

        $route->get('/', function() { 
            new \App\Controller\Home( $id );
        });

        
    }

}