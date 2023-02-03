# 装饰者模式

亦称： 装饰者模式、装饰器模式、Wrapper、Decorator

封装器是装饰模式的别称， 这个称谓明确地表达了该模式的主要思想。


## 解释

得先举个例子才能好好理解这个模式的目的。

就好像我们开发了一个文件数据读取的类。具备简单的写数据和读数据两个功能。

现在需求来了。觉得直接把数据写入存放不够安全，希望增加两个功能，把数据加密后再进行压缩在存放。

这样安全一点。

当然，我也可以不加密，直接压缩存放也可以。

拿到这个需求怎么搞？不但只是现在要加密和压缩。之后指不定还能想出啥玩意来。

简单的设计的话，可能我们就直接搞个加密类，再搞个压缩类。

用户先调用加密类得到加密后的数据，在调用压缩类，把数据压缩之后，再调用写入文件。

这样看来一点问题都没有。

但是增加的功能一旦多了。我们的用户就要调用好多复杂的功能去操作完了，再来写入数据。

(一定是对文件的写入写出的相关扩展功能)

我们可以定义一套模板，让所有想对文件读写增强的功能，都按照这个模板来开发。

这样就有了规范。用户在调用的时候，也就只需要明确自己要用什么功能，然后加上来就可以了。

![](https://refactoringguru.cn/images/patterns/diagrams/decorator/example.png)


DataSource 就是部件，在这里定义这个类提供的功能。

FileDataSource 文件读写功能。实现了上面的定义。

现在就可以基本的读写了。到了增强功能部分了。

DataSourceDecorator 数据源装饰。就是对数据源增强的一个基类，所有相对数据源功能增强的都必须实现这个基类。这通常是一个abstract。
这里使用组合的方式，保存着基础功能的对象引用。就是在该对象中，可以直接调用基础的功能，也就是(FileDataSource)。
并且这里提供的功能，需要和部件定义的接口一直(DataSource)。这样才算是扩展功能。

EncryptionDecorator 这就是功能增强的具体实现了。都必须继承DataSourceDecorator。
因为在父类中，已经实现了接口，所以这里就只关注自己需要增强的部分即可。


## 结构

![](https://refactoringguru.cn/images/patterns/diagrams/decorator/structure.png)


## 实例

[https://refactoringguru.cn/design-patterns/decorator](https://refactoringguru.cn/design-patterns/decorator)




