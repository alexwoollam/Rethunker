<?php

namespace App\Helpers;

class Functions{

    function currentPage( $this_page ){
        
        if ( $this_page === $_SERVER['REQUEST_URI'] ) {
            echo 'active';
        }
    }
    
}