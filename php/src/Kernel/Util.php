<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Util\Generic\Client as genericClient;
use Alipay\EasySDK\Util\AES\Client as aesClient;

class Util
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function generic()
    {
        return new genericClient($this->kernel);
    }

    public function aes()
    {
        return new aesClient($this->kernel);
    }
}
