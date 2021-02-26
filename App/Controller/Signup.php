<?php

namespace App\Controller;

class Signup{ 

    public function render(){
        
        require_once( dirname(__FILE__, 2) . '/View/Login.php' );
    }    
}