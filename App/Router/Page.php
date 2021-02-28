<?php
namespace App\Router;

use App\Controller\Users\Login;
use App\Controller\Users\Register;
use App\Controller\Users\Logout;

class Page extends Route {

    public function Routes(){

        $route = $this->router;

        $route->get('/login', function() {
            new \App\Controller\Login( 'login', null );
        });

        $route->post('/login', function($data = null) {
            new Login($_POST);
        });

        $route->get('/logout', function() {
            (new Logout())->User();
        });

        $route->get('/register', function() {
            new \App\Controller\Register( 'register', null );
        });

        $route->post('/register', function($data = null) {
            ( new Register($_POST) )->User();
        });

        $route->get('/([a-z0-9-]+)', function($id) use ($router) { 
            new \App\Controller\Standard( $id, null );
        });

        $route->get('/', function() { 
            new \App\Controller\Home( $id, null );
        });
   
    }

}