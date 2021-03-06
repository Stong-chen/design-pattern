# 享元模式

## 解释

Flyweight Design Pattern

共享元数据

## 目的

共享元数据，节省空间

不要新建太多相同的对象出来

通常，你保存的是对象的应用，而不是真实的对象。

## 案例

- [Editor.php](./Editor.php)

开发按一个文本编辑器，功能是需要记录每个字符的大小，颜色，字体。

开发这个需求。我们最简单的就是，建立一个数组。将每个字符存起来。

每个字符都是一个对象，对象里面保存着字符的大小、颜色、字体信息。

### 合理设计

按照上面的设计，每个字符都需要新建一个对象，如果文本编辑器需要编辑上万个字符。这样就会暂用很大的空间。

这个时候就可利用到享元了。我们已经实例过的对象，不需要再实例。直接使用这个对象的地址就好了。只需要保存每个字符的文字和对象的引用就好了。

这样就节省了很大的空间。

