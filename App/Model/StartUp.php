<?php

namespace App\Model;

use App\Model\DB;
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

        ( new DB )->CheckDBExists( 'ReThunker' );

        foreach( $this->defaultTables as $table ){
            ( new DBTables )->CreateTable( $table );
        }
    }

}
