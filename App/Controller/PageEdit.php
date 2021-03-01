<?php

namespace App\Controller;

class PageEdit extends AdminPage{


    public function Return( $id, $post ){
        
        require_once( dirname(__FILE__, 2) . '/View/Admin/EditPage.php' );
    }
}