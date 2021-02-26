<?php

namespace App\Controller;

class Signup extends Page{

    public function submit(){

        echo 'the dolphin';
    }

    public function render(){
        
        require_once( dirname(__FILE__, 2) . '/View/Login.php' );
    }    
}