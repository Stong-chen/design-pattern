# 原型模式(Prototype)

当我们需要创建很多完全相同的对象的时候，如果我们每次都是通过new的方式来创建。比较耗时而且对于CPU来说，也是消耗比较大的一个操作，内存的消耗也比较大。

为了节省时间和空间。我们可以`clone`已有的这些对象。就不用每次都`new`对象了。

## 案例

比如我们现在要开发一个文本编辑器。这个文本编辑器可以设置每个字的样式。样式的选择有字体大小、颜色、加粗。

```php
/**
 * 字体类
 */
class Font
{

    private $font;

    private $size;

    private $color;

    private $bold;

    function __construct($font, $color, $size, $bold)
    {
        $this->font = $font;
        $this->color = $color;
        $this->size = $size;
        $this->bold = $bold;
    }

    public function show()
    {
        echo "font:{$this->font}, size: {$this->size}, color: {$this->color}, bold: {$this->bold} \n";
    }
}


$fonts = [
    new Font('我', 18,'red', true),
    new Font('爱', 18,'red', true),
    new Font('你', 18,'red', true),
    new Font('P', 18,'red', true),
    new Font('H', 18,'red', true),
    new Font('P', 18,'red', true),
];

foreach ($fonts as $font) {
    $font->show();
}
```

我们会发现，这样子的话，我们要new的对象就太多了。如果我们这里是在写长篇文章，对内存来说是一个很大的消耗。

其实对于字体的样式，我们没有必要每次都保存新的，因为都是一模一样的。我们将样式单独提取出来。

当使用的字体样式是一样的时候，我们可以直接`clone`一个对象即可

```php
/**
 * 字体类
 */
class Font
{

    private $font;

    private $style;

    function __construct($font, FontStyle $fontStyle)
    {
        $this->font = $font;
        $this->style = $fontStyle;
    }

    public function show()
    {
        echo "font:{$this->font}, size: {$this->style->size}, color: {$this->style->color}, bold: {$this->style->bold} \n";
    }
}

interface FontClone
{
    public function clone();
}

class FontStyle implements FontClone
{
    public $size;

    public $color;

    public $bold;

    public function __construct($bold, $size, $color)
    {
        $this->bold = $bold;
        $this->color = $color;
        $this->size = $size;
    }

    public function clone(): FontStyle
    {
        // 浅克隆
        return $this;

        // 深克隆
//        return clone $this;
    }
}

class StyleManager
{
    /**
     * @var FontStyle[]
     */
    private static $style = [];

    public static function getStyle($size, $color, $bold): FontStyle
    {
        $key = $size . $color . $bold;

        if (!isset(static::$style[$key])) {
            static::$style[$key] = new FontStyle($bold, $size, $color);
        }

        return static::$style[$key]->clone();
    }
}


$fonts = [
    new Font('我', StyleManager::getStyle(18, 'red', true)),
    new Font('爱', StyleManager::getStyle(18, 'red', true)),
    new Font('你', StyleManager::getStyle(18, 'red', true)),
    new Font('P', StyleManager::getStyle(18, 'red', true)),
    new Font('H', StyleManager::getStyle(18, 'red', true)),
    new Font('P', StyleManager::getStyle(18, 'red', true)),
];

foreach ($fonts as $font) {
    $font->show();
}
```

