<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Security;

use Defuse\Crypto\Key;
use Defuse\Crypto\Crypto;

class Hash{

    public function __construct()
    {

        $this->loadEncryptionKeyFromConfig();
    }

    public function loadEncryptionKeyFromConfig(): Key
    {
        $file = dirname(__FILE__, 2) . '/Private/config.json';
        $json = json_decode(file_get_contents($file), true);
        $key = $json['hash_key'];    

        return Key::loadFromAsciiSafeString($key);
    }

    public function encrypt(string $email): string
    {
        
        $key = $this->loadEncryptionKeyFromConfig();
        $encoder = Crypto::encrypt($email, $key);
        return( $encoder );
    }

    public function decrypt(string $email): string
    {
        $key = $this->loadEncryptionKeyFromConfig();
        $encoder = Crypto::decrypt($email, $key);
        return( $encoder );
    }

}