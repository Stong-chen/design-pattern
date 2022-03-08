# 建造者

当在创建复杂对象的时候(构造函数参数很多)，可以使用建造者模式来简化这个创建过程。

## 案例

现在需要创建一个房子，但是房子有很多可选的配置。例如门、窗、电视背景墙、沙发、餐桌等。可选的参数太多了。

如果我们是直接通过构造函数来new房子出来的话，需要填入很多的参数，显得此类的构造函数非常臃肿。

```php
class House
{
    protected $door;

    protected $window;

    protected $TV_backdrop;

    protected $sofa;

    protected $dining_table;

    public function __construct($door, $window, $TV_backdrop, $sofa, $dining_table)
    {
        $this->door = $door;
        $this->window = $window;
        $this->TV_backdrop = $TV_backdrop;
        $this->sofa = $sofa;
        $this->dining_table = $dining_table;
    }

    public function show()
    {
        echo 'door: ' . $this->door . PHP_EOL;
        echo 'window: ' . $this->window . PHP_EOL;
        echo 'TV_backdrop: ' . $this->TV_backdrop . PHP_EOL;
        echo 'sofa: ' . $this->sofa . PHP_EOL;
        echo 'dining_table: ' . $this->dining_table . PHP_EOL;
    }
}

$house = new House('木门', '隔音玻璃', '菜色背景', '实木沙发', '圆形4人桌');
$house->show();
```
构造函数需要传入的参数太多了。而且还容易搞错顺序。
其实对于用户来说，选择太多，是一件很让人头疼的事。
为了简化客户的繁杂，我们把这个装修交给客户经理来帮我们进行。

他们会给我们提供很多装修的模板给我们选择，我们选择我们需要的模板就行，客户经理会去安排给我们装修房子，交付一个想要的房子给我们。


```php

class House
{
    protected $door;

    protected $window;

    protected $TV_backdrop;

    protected $sofa;

    protected $dining_table;

    public function show()
    {
        echo 'door: ' . $this->door . PHP_EOL;
        echo 'window: ' . $this->window . PHP_EOL;
        echo 'TV_backdrop: ' . $this->TV_backdrop . PHP_EOL;
        echo 'sofa: ' . $this->sofa . PHP_EOL;
        echo 'dining_table: ' . $this->dining_table . PHP_EOL;
    }

    /**
     * @param mixed $door
     */
    public function setDoor($door)
    {
        $this->door = $door;
    }

    /**
     * @param mixed $window
     */
    public function setWindow($window)
    {
        $this->window = $window;
    }

    /**
     * @param mixed $TV_backdrop
     */
    public function setTVBackdrop($TV_backdrop)
    {
        $this->TV_backdrop = $TV_backdrop;
    }

    /**
     * @param mixed $sofa
     */
    public function setSofa($sofa)
    {
        $this->sofa = $sofa;
    }

    /**
     * @param mixed $dining_table
     */
    public function setDiningTable($dining_table)
    {
        $this->dining_table = $dining_table;
    }
}

/**
 * Interface Builder
 * 这里其实也可以使用abstract。这样的话，就可以定义一些属性了
 */
interface Builder
{

    public function buildDoor();

    public function buildWindow();

    public function buildTVBackdrop();

    public function buildSofa();

    public function buildDiningTable();

    public function getHouse(): House;

}

/**
 * Class SimpleBuilder
 * 简单装修
 */
class SimpleBuilder implements Builder
{
    /**
     * @var House
     */
    private $house;

    public function buildDoor()
    {
        $this->house->setDoor('木质门');
    }

    public function buildWindow()
    {
        $this->house->setWindow('落地窗');
    }

    public function buildTVBackdrop()
    {
        $this->house->setTVBackdrop('纯白背景墙');
    }

    public function buildSofa()
    {
        $this->house->setSofa('实木沙发');
    }

    public function buildDiningTable()
    {
        $this->house->setDiningTable('4人小圆桌');
    }

    public function getHouse(): House
    {
        return $this->house;
    }
}

// ......其他类型的装修


class Director
{
    /**
     * @var Builder
     */
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function construct(): House
    {
        $this->builder->buildDoor();
        $this->builder->buildWindow();
        $this->builder->buildTVBackdrop();
        $this->builder->buildSofa();
        $this->builder->buildDiningTable();
        return $this->builder->getHouse();
    }

}

$simpleBuilder = new SimpleBuilder();
$director = new Director($simpleBuilder);
$house = $director->construct();
$house->show();
```



