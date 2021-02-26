<?php 

namespace App\Controller;

class Home extends Page implements PageInterface{

    public function Return( $id ){
        echo 'homepage';
    }
}