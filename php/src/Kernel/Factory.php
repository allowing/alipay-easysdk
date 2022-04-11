<?php

namespace Alipay\EasySDK\Kernel;

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
        static::$base = new Base($kernel);
        static::$marketing = new Marketing($kernel);
        static::$member = new Member($kernel);
        static::$payment = new Payment($kernel);
        static::$security = new Security($kernel);
        static::$util = new Util($kernel);
    }

    public static function setOptions($config)
    {
        if (!(static::$instance instanceof self)) {
            static::$instance = new self($config);
        }
        return static::$instance;
    }

    private function __clone()
    {
    }

    public static function base()
    {
        return static::$base;
    }

    public static function marketing()
    {
        return static::$marketing;
    }

    public static function member()
    {
        return static::$member;
    }

    public static function payment()
    {
        return static::$payment;
    }

    public static function security()
    {
        return static::$security;
    }

    public static function util()
    {
        return static::$util;
    }
}
