<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Security\TextRisk\Client as textRiskClient;

class Security
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function textRisk()
    {
        return new textRiskClient($this->kernel);
    }
}
