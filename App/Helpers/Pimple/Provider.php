<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Helpers\Pimple;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use App\Controller\Api\Pages\Get;

class Provider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['ReCMS.Fields.Pages'] = function () 
        {
            return ( new Get )->All();
        };

        $container['ReCMS.Fields.Users'] = function () 
        {
            return ['test'=>'test'];
        };
    }
}