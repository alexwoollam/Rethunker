<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Api\Pages;

class Check extends Pages{

    public function NewInstall(): bool
    {

        if($this->DB->table->table('pages')->count()->run($this->DB->db) === 0.0){
            return true;
        }
        return false;
    }

    public function PageCount(): float
    {
        return $this->DB->table->table('pages')->count()->run($this->DB->db);
    }
    
}