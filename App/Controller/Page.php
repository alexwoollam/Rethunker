<?php

namespace App\Controller;

class Page{

    public function __construct( $id ){
        require_once( dirname(__FILE__, 2) . '/View/Global/Header.php' );
        $this->Return( $id );
    }
    public function __destruct(){
        require_once( dirname(__FILE__, 2) . '/View/Global/Footer.php' );
    }
    
}