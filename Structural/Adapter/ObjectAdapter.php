<?php
declare(strict_types = 1);


// 电子产品
class Product
{
    function run(Powered $powered)
    {
        if ($powered->getPower() !== 220) {
            echo '电压不正确，不能开始工作' . PHP_EOL;
        } else {
            echo '开始工作' . PHP_EOL;
        }
    }

}

// 这是美国的供电标准，输出110V
class Powered
{
    // 获取电力
    function getPower()
    {
        return 110;
    }
}

// 适配器供电
class Adapter220V extends Powered
{

    function getPower()
    {
        $power = parent::getPower();
        // 经过一波操作
        return 220;
    }

}


// 使用适配器
$adapter = new Adapter220V();
$product = new Product();
$product->run($adapter); // 开始工作


$powered = new Powered();
$product->run($powered); // 电压不正确，不能开始工作


