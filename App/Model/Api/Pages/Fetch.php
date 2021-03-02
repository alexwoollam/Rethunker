<?php

namespace App\Model\Api\Pages;

use App\Controller\Users\User;

class Fetch extends Pages{

    public function AllPages(){
    
        return $this->DB->table->table('pages')->orderBy(['index' => 'id'])->run($this->DB->db);
    }

    public function WithId($id){

        return $this->DB->table->table('pages')->get($id)->run($this->DB->db);
    }
}