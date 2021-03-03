<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller;

class Dashboard extends Page{

    public function Return( $id, $post ){
        
        require_once( dirname(__FILE__, 2) . '/View/Dashboard.php' );
    }
}