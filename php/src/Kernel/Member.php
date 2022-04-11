<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Member\Identification\Client as identificationClient;

class Member
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function identification()
    {
        return new identificationClient($this->kernel);
    }
}
