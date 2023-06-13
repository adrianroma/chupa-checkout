<?php

namespace Chupa\Journey\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Log extends Base
{

    /**
     * @var string
     */
    public $fileName = '/var/log/journey.log';

    /**
     * @var
     */
    protected $loggerType = Logger::DEBUG;

}
