<?php

namespace App;

use App\Model\StartUp;
use App\Router\Route;
use App\Controller\Mail;
use Pimple\Container;
use App\Helpers\Pimple\Provider;
use App\Controller\Login;
use App\Controller\Users\Cookie;

/**
 * Boot class
 * First class called.
 */
class Boot
{

    /**
     * Initiation constructor, initiates the framework.
     */
    public function __construct()
    {

        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        global $container;
        $container = new Container;
        new StartUp();
        ( new Provider() )->register($container);
        ( new Cookie() )->CheckCookie();
        ( new Route() )->Routes();
    }
}
new Boot();