<?php
namespace App\Router;

use App\Controller\Users\Login;
use App\Controller\Users\Register;
use App\Controller\Users\Logout;
use App\Controller\Mail;

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

        $route->get('/dashboard', function($data = null) { 
            new \App\Controller\Standard( null, null );
        });


      

        $route->get('/test', function($data = null) {
            $data = array('to' => 'test@test.com', 'name' => 'Test User', 'subject' => 'Password reset', 'body' => 'this is some content' );
            ( new Mail($data) )->Send();
        });
        

        $route->get('/([a-z0-9-]+)', function($id) use ($router) { 
            new \App\Controller\Standard( $id, null );
        });

        $route->get('/', function() { 
            new \App\Controller\Home( $id, null );
        });
   
    }

}