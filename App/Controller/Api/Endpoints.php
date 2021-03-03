<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller\Api;

class Endpoints{

    public function Pages(){
        var_dump( '/pages/ for all, or /page/{id} for single page.' );
    }
}