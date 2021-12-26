<?php
declare(strict_types = 1);


/*
 * 需求:
 * 根据不同的国家前缀，验证手机号码是否正确。
 *
 * 例如：中国大陆
 * +86 13746528763
 */

// 定义一个手机验证的接口
interface PhoneVerification
{
    public function verify(string $phone);
}

// 中国大陆手机验证
class China implements PhoneVerification
{


    public function verify(string $phone)
    {
        // TODO: Implement verify() method.
    }
}

// 香港验证
class Hongkong implements PhoneVerification
{

    public function verify(string $phone)
    {
        // TODO: Implement verify() method.
    }
}

// 澳门验证
class Macao implements PhoneVerification
{
    public function verify(string $phone)
    {
        // TODO: Implement verify() method.
    }
}

// 通过工厂选择不同的验证策略
class PhoneVerificationFactory
{

    // 使用单例模式
    private static $verifyClass = [];


    public static function getVerify(string $countryCode): PhoneVerification
    {
        if ($countryCode === '+86') {
            if (!isset(static::$verifyClass[$countryCode])) {
                static::$verifyClass[$countryCode] = new China();
            }
        } elseif ($countryCode === '+852') {
            if (!isset(static::$verifyClass[$countryCode])) {
                static::$verifyClass[$countryCode] = new Hongkong();
            }
        } elseif ($countryCode === '+853') {
            if (!isset(static::$verifyClass[$countryCode])) {
                static::$verifyClass[$countryCode] = new Macao();
            }
        } else {
            throw new RuntimeException('没有验证类');
        }

        return static::$verifyClass[$countryCode];
    }
}

class Login
{
    public function reg()
    {
        $phone   = $_GET['phone'];
        $country = $_GET['country'];


        // 验证手机号码是否正确
        if (PhoneVerificationFactory::getVerify($country)->verify($phone)) {
            // 通过验证
        } else {
            // 不通过验证
        }

    }
}

