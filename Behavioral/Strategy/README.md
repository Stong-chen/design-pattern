# 策略模式


Strategy Design Pattern

## 解释

Define a family of algorithms, encapsulate each one, and make them interchangeable. Strategy lets the algorithm vary independently from clients that use it.


定义一族算法类，将每个算法分别封装起来，让它们可以互相替换。策略模式可以使算法的变化独立于使用它们的客户端（这里的客户端代指使用算法的代码）。

## 案例
我们的网站服务于很多个国家，当有新用户注册的时候，都是需要绑定手机号的。

每个国家的手机号码的规则都不一样。所以，我们就需要根据不同的国家来验证手机号码是否正确。

这时就可以用到策略模式了，根据手机号的前缀`+86`。我们可以判断是哪个国家的。然后再使用这个国家的策略来验证手机号码是否正确。



