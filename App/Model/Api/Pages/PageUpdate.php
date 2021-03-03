<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Model\Api\Pages;

use App\Controller\Users\User;
use App\Helpers\Log;

class PageUpdate extends Pages{

    public function Add( int $id, string $title, string $content, string $status = "draft")
    {
        $page = [
            'status' => $status,
            'updated'=> date('Y-m-d H:i:s'),
            'title'  => $title,
            'content'=> $content,
        ];
        
        try{
            $this->DB->table->table('pages')->get($id)->update($page)->run($this->DB->db);
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } catch( \Exception $err ){
            ( new Log )->error( "Page update failed, error message: " . $err );
        }       
    }
}