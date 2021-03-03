<?php declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Helpers\Pimple;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use App\Controller\Api\Pages\Get;

class Provider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['ReCMS.Pages'] = function () 
        {
            return ( new Get )->All();
        };

        $container['ReCMS.Pages.Count'] = function () 
        {
            return ( new Get )->Count();
        };

        $container['ReCMS.Users'] = function () 
        {
            return ['test'=>'test'];
        };
    }
}