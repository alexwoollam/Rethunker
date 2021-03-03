<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller;

use App\Boot;
use App\Controller\Api\Pages\Get;
use App\Controller\Users\User;
use App\Helpers\Log;
use App\Helpers\Functions;

class PageEdit extends AdminPage{

    public function Context(): array
    {

        global $container;
        $pages = $container['ReCMS.Pages'];
        $pagecount = $container['ReCMS.Pages.Count'];
        $current_user = (new User)->GetEmail();

        $get = new Get();
        $editing_page = 99;
        $new_page = true;
        if(isset($_GET["id"])){
            $new_page = false;
            $editing_page = intval($_GET["id"]);
        }
        $current_page = $get->WithId($editing_page);

        $data = [
            'pages' => $pages,
            'pagecount' => $pagecount,
            'current_user' => $current_user,
            'editing_page' => $editing_page,
            'new_page'     => $new_page,
            'current_page' => $current_page
        ];

        return $data;
    }

    public function Return( $id, $post )
    {

        $this->View('Admin/EditPage', $this->Context());
    }
}