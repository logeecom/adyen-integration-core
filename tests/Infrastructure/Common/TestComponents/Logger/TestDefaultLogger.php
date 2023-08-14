<?php

namespace Adyen\Core\Tests\Infrastructure\Common\TestComponents\Logger;

use Adyen\Core\Infrastructure\Http\HttpClient;
use Adyen\Core\Infrastructure\Logger\Interfaces\ShopLoggerAdapter;
use Adyen\Core\Infrastructure\Logger\LogData;
use Adyen\Core\Infrastructure\ServiceRegister;

class TestDefaultLogger implements ShopLoggerAdapter
{
    /**
     * @var LogData
     */
    public $data;
    /**
     * @var LogData[]
     */
    public $loggedMessages = array();

    public function logMessage(LogData $data)
    {
        $this->data = $data;
        $this->loggedMessages[] = $data;
        /** @var  HttpClient $http */
        $http = ServiceRegister::getService(HttpClient::CLASS_NAME);
        $http->requestAsync('POST', '');
    }

    public function isMessageContainedInLog($message)
    {
        foreach ($this->loggedMessages as $loggedMessage) {
            if (mb_strpos($loggedMessage->getMessage(), $message) !== false) {
                return true;
            }
        }

        return false;
    }
}
