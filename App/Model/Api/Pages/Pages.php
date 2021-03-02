<?php

namespace App\Model\Api\Pages;

use App\Model\DB;

class Pages{

    public $DB;

    public function __construct(){
        $this->DB = new DB();
    }
    
}