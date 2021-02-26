<?php

namespace App\Model;

use App\Model\DBTables;

class StartUp{
    
    public $defaultTables;

    public function __construct(){

        $this->defaultTables = [
            'options',
            'pages',
            'users',
            'articles'
        ];

        $this->setupDefaultTables();
    }

    public function setupDefaultTables(){

        foreach( $this->defaultTables as $table ){
            ( new DBTables )->CreateTable( $table );
        }
    }

}
