<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller;

use App\Controller\Users\User;

class AdminPage{

    public function __construct( $id, $post ){
        (new User)->CheckAuthentication();
        require_once( dirname(__FILE__, 2) . '/View/Global/Header.php' );
        require_once( dirname(__FILE__, 2) . '/View/Global/Menu.php' );
        $this->Return( $id, $post );
    }

    public function View( $path, $data ){

        ob_start();
        include( dirname(__FILE__, 2) . '/View/'. $path . '.php' );
        $buffer = ob_get_contents();
		@ob_end_clean();
		echo $buffer;
        $data = null;
    }

    public function __destruct(){
        require_once( dirname(__FILE__, 2) . '/View/Global/Footer.php' );
    }
    
}