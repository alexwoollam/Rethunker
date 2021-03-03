<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model;

use r as rethink;

class DB {

    public $db;
    public $table;

    public function __construct(){

        $this->db = rethink\connect("db");
        $this->CheckDBExists( 'ReThunker' );
    }

    public function CheckDBExists( $name ): void
    {

        if( rethink\dbList()->contains($name)->run($this->db) ){
            $this->table = rethink\db($name);
            return;
        };

        rethink\dbCreate( $name )->run($this->db);
        $this->table = rethink\db($name);
        return;
    }    
}