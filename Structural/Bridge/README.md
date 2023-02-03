# 桥接模式

桥接模式是一种结构型设计模式， 可将一个大类或一系列紧密相关的类拆分为抽象和实现两个独立的层次结构， 从而能在开发时分别使用。

## 解释

在桥接中，定义了抽象部分和实现部分。

抽象就好比是一个需求文档，一个要求。就类似桌面应用的发送按钮。(这里的抽象不是代码的abstract类，而已一个普通的类，只是取了一个叫抽象的名字而已)

实现就是实现上面抽象定义的要求。告诉抽象，你要发送，就调用我的send 函数即可。

实现需要定义成为一个接口(interface)。

然后不同的平台，要来实现这个interface。Mac系统、Android系统、Linux系统、Windows系统，分别实现这个实现接口即可完成发送；


## 实际例子

就好像空调和遥控器之间的关系。

首先定义个组功能。开关、温度+、温度-。这就是所谓的抽象

下面我们就要实现上面定义的功能。每种空调品牌都必须实现上面的基础功能，所以我们定义一个实现接口

所有空调品牌都实现这个接口即可。
比如提供以下能力，就能实现上面的功能；
isEnabled、 enable、disable、getTemperature、setTemperature


## 结构

![](https://refactoringguru.cn/images/patterns/diagrams/bridge/structure-zh.png)

![](https://refactoringguru.cn/images/patterns/diagrams/bridge/example-zh.png)

## 代码实例

[https://refactoringguru.cn/design-patterns/bridge](https://refactoringguru.cn/design-patterns/bridge)
