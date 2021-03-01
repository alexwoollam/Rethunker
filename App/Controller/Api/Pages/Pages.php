<?php

namespace App\Controller\Api\Pages;

class Pages{

    public $page_id;

    public function __construct($id){
        $this->page_id = $id;
    }

}