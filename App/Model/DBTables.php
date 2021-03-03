<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model;

use r as rethink;
use App\Helpers\Log;

class DBTables extends DB{

    public function CreateTable( string $tabelName ): void
    {

        if( ! $this->CheckTableExist( $tabelName ) ){
            $this->table->tableCreate($tabelName)->run($this->db);
        }
    }

    public function CheckTableExist( string $tableName ): bool
    {
        
        if($this->table->tableList()->contains($tableName)->run($this->db)){
            return true;
        }
        return false;
    }

    public function Insert( string $table, array $insert ): bool
    {

        try{
            $this->table->table($table)->insert($someContent)->run($this->db);
            return true;
        } catch ( \Exception $err ) {
            ( new Log )->error( "Table insert failed, error message: " . $err );
            return false;
        }
        
    }
}