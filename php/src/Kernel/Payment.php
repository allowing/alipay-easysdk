<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Payment\App\Client as appClient;
use Alipay\EasySDK\Payment\Common\Client as commonClient;
use Alipay\EasySDK\Payment\FaceToFace\Client as faceToFaceClient;
use Alipay\EasySDK\Payment\Huabei\Client as huabeiClient;
use Alipay\EasySDK\Payment\Page\Client as pageClient;
use Alipay\EasySDK\Payment\Wap\Client as wapClient;

class Payment
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function app()
    {
        return new appClient($this->kernel);
    }

    public function common()
    {
        return new commonClient($this->kernel);
    }

    public function faceToFace()
    {
        return new faceToFaceClient($this->kernel);
    }

    public function huabei()
    {
        return new huabeiClient($this->kernel);
    }

    public function page()
    {
        return new pageClient($this->kernel);
    }

    public function wap()
    {
        return new wapClient($this->kernel);
    }
}
