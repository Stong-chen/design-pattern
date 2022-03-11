# 工厂模式(Factory)

工厂模式也属于创建型模式。

当我们需要通过不同的规则创建不同的对象的时候，又或者是创建对象的过程比较复杂。

这个时候我们可以将这个工作交给工厂模式来帮我们完成。

## 案例

比如我们现在要获取配置文件。但是配置文件支持多种格式。yaml、json、xml、ini等。

我们可以通过文件的后缀名来判断当前文件的类型，然后通过不同的解析器来解析配置文件。

```php
class YamlConfigParSer
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class JsonConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class XmlConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class IniConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}


$filePath = './a.ini';

$ext = substr($filePath, strripos($filePath, '.'));

if ($ext === 'ini') {
    $parse = new IniConfigParser();
} elseif ($ext === 'xml') {
    $parse = new XmlConfigParser();
} elseif ($ext === 'json') {
    $parse = new JsonConfigParser();
} elseif ($ext === 'yaml') {
    $parse = new YamlConfigParSer();
} else {
    exit('找不到解析器');
}

var_dump($parse->parser(file_get_contents($filePath)));
```

这样子的话，我们就需要在业务代码里面写很多逻辑判断来判断应该创建哪个解析器。

而且这个代码的重复率及其的高。

这是我们可以使用简单工厂来优化它。把创建的工作交给工厂模式去处理。

```php
interface ConfigParser
{
    public function parser($config);
}

class YamlConfigParSer implements ConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class JsonConfigParser implements ConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class XmlConfigParser implements ConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class IniConfigParser implements ConfigParser
{
    public function parser($config)
    {
        // 解析文件内容，返回解析之后的对象
        return [];
    }
}

class ConfigParserFactory
{
    public static function getInstance($ext)
    {
        if ($ext === 'ini') {
            $parser = new IniConfigParser();
        } elseif ($ext === 'xml') {
            $parser = new XmlConfigParser();
        } elseif ($ext === 'json') {
            $parser = new JsonConfigParser();
        } elseif ($ext === 'yaml') {
            $parser = new YamlConfigParSer();
        } else {
            exit('找不到解析器');
        }
        return $parser;

    }
}


$filePath = './a.ini';
$ext = substr($filePath, strripos($filePath, '.'));
$parse = ConfigParserFactory::getInstance($ext);

var_dump($parse->parser(file_get_contents($filePath)));
```

这是最简单的简单工厂，在简单工厂的改进之下还有工厂方法、抽象工厂。

但是他们都离不开最初的目的。就是将创建相同类型的对象的这个过程交给一个工厂去帮忙处理，而不是在业务端自行判断。