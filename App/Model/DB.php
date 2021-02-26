<?php
namespace App\Model;

use r as rethink;

class DB {

    public $db;

    public $table;

    public function __construct(){

        $this->db = rethink\connect("db");
        $this->table = rethink\db("ReThunker");
    }

    
}