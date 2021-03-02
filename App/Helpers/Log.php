<?php

namespace App\Helpers;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log{

    protected $folder;
    protected $logger;

    public function __construct(){
        
        $this->folder = '/var/www/html/logs';
        $this->logger = new Logger('ReCMS');
    }

    public function Info($sent_data): void
    {

        $this->logger->pushHandler(new StreamHandler($this->folder.'/info.log', Logger::DEBUG));
        $this->logger->info($sent_data);
    }
    
    public function Warning($sent_data): void
    {

        $this->logger->pushHandler(new StreamHandler($this->folder.'/warning.log', Logger::DEBUG));
        $this->logger->warning($sent_data);
    }

    public function Error($sent_data): void
    {

        $this->logger->pushHandler(new StreamHandler($this->folder.'/error.log', Logger::DEBUG));
        $this->logger->error($sent_data);
    }
}

