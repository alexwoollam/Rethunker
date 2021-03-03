<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller\Api\Pages;

use App\Model\Api\Pages\PageNew;
use App\Model\Api\Pages\PageUpdate;
use App\Model\Api\Pages\Delete;

class Set extends Pages{

    
    public function NewPage($post): void
    {

        $title = $post['title'];
        $content = $post['content'];
        $user = $post['current_user'];
        $status = 'draft';
        if ($post['status']) {
            $status = $post['status'];
        }
        
        (new PageNew )->Add( $title, $content, $user, $status);

    }

    public function Update($post): void
    {       

        $status = 'draft';
        if( $post['status'] == 'on' ){
            $status = 'published';
        }
        $id = intval($post['id']);
        $title = $post['title'];
        $content = $post['content'];
        (new PageUpdate )->Add( $id, $title, $content, $status);
    }

    public function Delete($post): void
    {

        $id = intval($post['id']);
        ( new Delete )->Page( $id );
    }
}