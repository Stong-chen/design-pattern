<?php
declare(strict_types = 1);

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

