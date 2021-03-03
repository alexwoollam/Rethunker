<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Api\Pages;

use App\Controller\Users\User;

class Fetch extends Pages{

    public function AllPages(): array
    {

        return $this->DB->table->table('pages')->orderBy(['index' => 'id'])->run($this->DB->db);        
    }

    public function WithId($id): ?object
    {

        return $this->DB->table->table('pages')->get($id)->run($this->DB->db);
    }
}