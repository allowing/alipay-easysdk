<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Payment\App\Client as AppClient;
use Alipay\EasySDK\Payment\Common\Client as CommonClient;
use Alipay\EasySDK\Payment\FaceToFace\Client as FaceToFaceClient;
use Alipay\EasySDK\Payment\Huabei\Client as HuabeiClient;
use Alipay\EasySDK\Payment\Page\Client as PageClient;
use Alipay\EasySDK\Payment\Wap\Client as WapClient;

class Payment
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function app()
    {
        return new AppClient($this->kernel);
    }

    public function common()
    {
        return new CommonClient($this->kernel);
    }

    public function faceToFace()
    {
        return new FaceToFaceClient($this->kernel);
    }

    public function huabei()
    {
        return new HuabeiClient($this->kernel);
    }

    public function page()
    {
        return new PageClient($this->kernel);
    }

    public function wap()
    {
        return new WapClient($this->kernel);
    }
}
