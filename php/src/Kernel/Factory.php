<?php

namespace Alipay\EasySDK\Kernel;

use Alipay\EasySDK\Util\Generic\Client as genericClient;
use Alipay\EasySDK\Util\AES\Client as aesClient;

class Factory
{
    public $config = null;
    public $kernel = null;
    private static $instance;
    protected static $base;
    protected static $marketing;
    protected static $member;
    protected static $payment;
    protected static $security;
    protected static $util;

    private function __construct($config)
    {
        if (!empty($config->alipayCertPath)) {
            $certEnvironment = new CertEnvironment();
            $certEnvironment->certEnvironment(
                $config->merchantCertPath,
                $config->alipayCertPath,
                $config->alipayRootCertPath
            );
            $config->merchantCertSN = $certEnvironment->getMerchantCertSN();
            $config->alipayRootCertSN = $certEnvironment->getRootCertSN();
            $config->alipayPublicKey = $certEnvironment->getCachedAlipayPublicKey();
        }

        $kernel = new EasySDKKernel($config);
        self::$base = new Base($kernel);
        self::$marketing = new Marketing($kernel);
        self::$member = new Member($kernel);
        self::$payment = new Payment($kernel);
        self::$security = new Security($kernel);
        self::$util = new Util($kernel);
    }

    public static function setOptions($config)
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    private function __clone()
    {
    }

    public static function base()
    {
        return self::$base;
    }

    public static function marketing()
    {
        return self::$marketing;
    }

    public static function member()
    {
        return self::$member;
    }

    public static function payment()
    {
        return self::$payment;
    }

    public static function security()
    {
        return self::$security;
    }

    public static function util()
    {
        return self::$util;
    }
}

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

    public function aes(){
        return new aesClient($this->kernel);
    }
}

