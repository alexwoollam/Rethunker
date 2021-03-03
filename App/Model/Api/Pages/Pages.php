<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Api\Pages;

use App\Model\DB;

class Pages{

    public $DB;

    public function __construct(){
        $this->DB = new DB();
    }
    
}