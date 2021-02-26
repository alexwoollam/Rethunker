<?php

namespace App\Model\Users;

use App\Model\DB;

class UserCheck{
 
    public function NewInstall(): bool
    {

        $DB = new DB();
        if( $DB->table->table('users')->count()->run($DB->db) === 0.0 ){
            return true;
        }
        return false;
    }
}