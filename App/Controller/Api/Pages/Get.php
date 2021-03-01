<?php

namespace App\Controller\Api\Pages;

use App\Model\Api\Pages\Check;
use App\Model\Api\Pages\Fetch;

class Get extends Pages{

    public function WithId(){
       
        echo( 'id: ' . $this->page_id );
    }

    public function All(){

        return['all'];
    }
}