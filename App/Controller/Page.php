<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller;

class Page{

    public function __construct( $id, $post ){
        require_once( dirname(__FILE__, 2) . '/View/Global/Header.php' );
        require_once( dirname(__FILE__, 2) . '/View/Global/Menu.php' );
        $this->Return( $id, $post );
    }
    public function __destruct(){
        require_once( dirname(__FILE__, 2) . '/View/Global/Footer.php' );
    }
    
}