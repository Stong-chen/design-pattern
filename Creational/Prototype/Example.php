<?php


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

        if (isset(static::$style[$key])) {
            return static::$style[$key]->clone();
        }

        static::$style[$key] = new FontStyle($bold, $size, $color);
        return static::$style[$key];
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

