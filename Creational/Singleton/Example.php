<?php
declare(strict_types=1);

class Demo
{
    private static $classInstance;

    /**
     * 不可以在外部直接new实例化对象
     */
    private function __construct()
    {
    }

    /**
     * 获取实例
     * @return static
     */
    public static function getInstance(): Demo
    {
        if (!static::$classInstance) {
            static::$classInstance = new static;
        }
        return static::$classInstance;

    }

    public function A()
    {

    }

    public function B()
    {

    }

    public function C()
    {

    }
}

// 这是不被允许的
//$demo = new Demo();

// 通过这种方式获取对象
$demo = Demo::getInstance();

/*
 * 通常来说。我们还可以将单例模式的这种方式写成一个trait
 */


trait StaticInstanceTrait
{

    private static $_instances = [];


    /**
     * @return static
     */
    public static function instance($refresh = false)
    {
        $className = get_called_class();
        if ($refresh || !isset(self::$_instances[$className])) {
            // 如果这里加上类的依赖注入就更好了
            self::$_instances[$className] = new $className;
        }
        return self::$_instances[$className];
    }
}

class Demo2{
    use StaticInstanceTrait;

    public function A(){

    }

    public function B(){

    }

    public function C(){

    }
}

$demo2 = Demo2::instance();
$demo2->A();


