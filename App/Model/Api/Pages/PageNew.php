<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Api\Pages;

use App\Controller\Users\User;
use App\Helpers\Log;


class PageNew extends Pages{

    public function Add( string $title, string $content, string $user, string $status = "draft")
    {
        $next_avalible_page_number = ( new Check() )->PageCount();
        $page = [
            'id'     => $next_avalible_page_number,
            'status' => $status,
            'date'   => date('Y-m-d H:i:s'),
            'title'  => $title,
            'content'=> $content,
            'author' => $user
        ];
        
        try{
            $this->DB->table->table('pages')->insert($page)->run($this->DB->db);
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } catch( \Exception $err ){
            ( new Log )->error( "Page add failed, error message: " . $err );
        }       
    }
}