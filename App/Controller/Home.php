<?php 

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller;

class Home extends Page implements PageInterface{

    public function Return( $id, $post ){

        echo 'homepage';
    }
}