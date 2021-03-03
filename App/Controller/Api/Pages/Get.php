<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller\Api\Pages;

use App\Model\Api\Pages\Check;
use App\Model\Api\Pages\Fetch;

class Get extends Pages{

    public function Count(){
        return ( new Check )->PageCount();
    }

    public function WithId( $id=0 ){
       
        return ( new Fetch )->WithId($id);
    }

    public function All(): array
    {
        $ids = [];
        $page_array = [];
      
        for ($i = 0; $i <= $this->Count(); ++$i) {
            $ids[] = $i;
        }

        foreach( $ids as $id ){
            $storage = $this->WithId( $id );
            $page_array[] = $storage;
        }

        return $page_array;
    }
}