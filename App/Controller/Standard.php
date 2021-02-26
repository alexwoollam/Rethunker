<?php 

namespace App\Controller;

class Standard extends Page implements PageInterface{
   
    public function Return( $id ){

        echo 'Page requested: ' . $id;
    }
}