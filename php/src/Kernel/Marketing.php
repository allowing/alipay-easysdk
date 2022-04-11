<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Marketing\OpenLife\Client as OpenLifeClient;
use Alipay\EasySDK\Marketing\Pass\Client as PassClient;
use Alipay\EasySDK\Marketing\TemplateMessage\Client as TemplateMessageClient;

class Marketing
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function openLife()
    {
        return new OpenLifeClient($this->kernel);
    }

    public function pass()
    {
        return new PassClient($this->kernel);
    }

    public function templateMessage()
    {
        return new TemplateMessageClient($this->kernel);
    }
}
