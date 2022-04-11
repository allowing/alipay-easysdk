<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Base\Image\Client as imageClient;
use Alipay\EasySDK\Base\OAuth\Client as oauthClient;
use Alipay\EasySDK\Base\Qrcode\Client as qrcodeClient;
use Alipay\EasySDK\Base\Video\Client as videoClient;

class Base
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function image()
    {
        return new imageClient($this->kernel);
    }

    public function oauth()
    {
        return new oauthClient($this->kernel);
    }

    public function qrcode()
    {
        return new qrcodeClient($this->kernel);
    }

    public function video()
    {
        return new videoClient($this->kernel);
    }
}
