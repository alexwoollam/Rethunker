<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Api\Pages;

class Delete extends Pages{

    public function Page($id)
    {

        try{
            $this->DB->table->table('pages')->get($id)->delete()->run($this->DB->db);
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } catch( \Exception $err ){
            ( new Log )->error( "Page deletion failed, error message: " . $err );
        } 
    }

    
}