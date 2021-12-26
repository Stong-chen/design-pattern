<?php
declare(strict_types = 1);

interface RegObserver
{
    public function handleRegSuccess(int $userId);
}

class SendMessage implements RegObserver {


    public function handleRegSuccess(int $userId)
    {
        echo 'send message'. $userId;
    }
}


// 用户类
class User
{

    /**
     * 注册观测者
     *
     * @var RegObserver array
     */
    public $regObserver = [];

    public function addRegObserver(RegObserver $observer)
    {
        $this->regObserver[] = $observer;

    }


    public function reg($username, $password)
    {
        // .... user DAO
        $userid = 0;
        // 发送通知
        foreach ($this->regObserver as $item) {
            $item->handleRegSuccess($userid);
        }
    }
}

$user = new User();
$user->addRegObserver(new SendMessage);
$user->reg('aaaa', 'bbbb');