<?php

namespace App\Controller;

class Dashboard extends Page{

    public function Return( $id, $post ){
        
        require_once( dirname(__FILE__, 2) . '/View/Dashboard.php' );
    }
}