<?php

namespace App\Controller;

use App\Controller\Users\User;

class AdminPage{

    public function __construct( $id, $post ){
        (new User)->CheckAuthentication();
        require_once( dirname(__FILE__, 2) . '/View/Global/Header.php' );
        require_once( dirname(__FILE__, 2) . '/View/Global/Menu.php' );
        $this->Return( $id, $post );
    }
    public function __destruct(){
        require_once( dirname(__FILE__, 2) . '/View/Global/Footer.php' );
    }
    
}