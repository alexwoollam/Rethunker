<?php

namespace App\Controller;

class Register extends Page{

    public function Return( $id ){
        
        require_once( dirname(__FILE__, 2) . '/View/Register.php' );
    }    
}