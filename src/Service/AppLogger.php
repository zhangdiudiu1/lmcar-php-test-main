<?php

namespace App\Service;
use App\Service\Log\Log4;
use App\Service\Log\ThinkLog;
class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINK_LOG = 'thinkLog';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = new Log4();
        }else{
            $this->logger = new ThinkLog();
        }
    }
    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }

}