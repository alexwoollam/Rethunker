<?php

namespace App\Model\Users;

use App\Model\DB;

class User{

    public $DB;

    public function __construct(){
        $this->DB = new DB();
    }
    
}