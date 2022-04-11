<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Base\Image\Client as ImageClient;
use Alipay\EasySDK\Base\OAuth\Client as OauthClient;
use Alipay\EasySDK\Base\Qrcode\Client as QrcodeClient;
use Alipay\EasySDK\Base\Video\Client as VideoClient;

class Base
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function image()
    {
        return new ImageClient($this->kernel);
    }

    public function oauth()
    {
        return new OauthClient($this->kernel);
    }

    public function qrcode()
    {
        return new QrcodeClient($this->kernel);
    }

    public function video()
    {
        return new VideoClient($this->kernel);
    }
}
