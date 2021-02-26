<?php

namespace App\Model;

use r as rethink;

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

    public function Insert( string $table, array $insert ): boolean
    {

        try{
            $this->table->table($table)->insert($someContent)->run($this->db);
            return true;
        } catch ( Exception $err ) {
            return false;
        }
        
    }
}