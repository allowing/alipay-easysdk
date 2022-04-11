<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Util\Generic\Client as GenericClient;
use Alipay\EasySDK\Util\AES\Client as AesClient;

class Util
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function generic()
    {
        return new GenericClient($this->kernel);
    }

    public function aes()
    {
        return new AesClient($this->kernel);
    }
}
