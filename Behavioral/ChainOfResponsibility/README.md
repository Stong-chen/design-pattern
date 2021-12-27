# 职责链模式

Chain of Responsibility

Avoid coupling the sender of a request to its receiver by giving more than one object a chance to handle the request. Chain the receiving objects and pass the request along the chain until an object handles it.


将请求的发送和接收解耦，让多个接收对象都有机会处理这个请求。将这些接收对象串成一条链，并沿着这条链传递这个请求，直到链上的某个接收对象能够处理它为止。

通常来说，我们不一定要在某个处理器处理的时候，一定要让它停下来。我们最主要的是，要让链上面的每个处理器都有机会处理它。


## 应用场景

### 过滤敏感词汇

当用户发表言论的时候，我们需要验证用户是否有敏感的词句子里面，当时我们的过滤词库通常不止一个。可能是好多个词库都需要验证。

这时候就可以组成一个职责链了。让每个过滤的库都验证一遍，只要遇到验证不通过的就可以停下来。提示验证不通过。

### YII2的事件

其实在YII2的事件里面就是用的职责链，在事件被触发之后，监听这个事件的所有处理器都被依次执行，如果某个处理器需要停止其后的处理器调用，就需要设置`$event->handled = true;`

可参考文档[https://www.yiiframework.com/doc/guide/2.0/zh-cn/concept-events](https://www.yiiframework.com/doc/guide/2.0/zh-cn/concept-events)




