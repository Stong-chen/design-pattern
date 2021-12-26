<?php
declare(strict_types = 1);


class Component
{

    public function do()
    {
        // 获取现有的事件
        $behaviors = $this->behaviors();
        foreach ($behaviors as $behavior) {
            var_dump($behavior);
        }
        // ......其他的业务逻辑
    }


    public function behaviors()
    {
        return [];
    }
}


class Http extends Component
{

    public function behaviors()
    {
        return [
            ['a'=>'a'],
            ['a'=>'a'],
            ['a'=>'a'],
            ['a'=>'a'],
        ];
    }



}


$http = new Http();
$http->do();