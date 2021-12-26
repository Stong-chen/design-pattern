<?php

/**
 * Class CharacterStyle
 * 新建一个保存字符样式的类
 *
 * @author zhangrongdong <admin@zrongdong.com>
 * date: 2021/12/19 9:00 下午
 */
class CharacterStyle
{

    private $font;

    private $size;

    private $color;

    public function __construct(string $font, int $size, string $color)
    {
        $this->color = $color;
        $this->font  = $font;
        $this->size  = $size;
    }
}

// 文字样式工厂
class CharacterStyleFactor
{
    /**
     * 保存文字样式的数组
     *
     * @var array
     */
    private static $characterStyleList = [];

    // 获取文字样式
    public static function getCharacterStyle(string $font, int $size, string $color)
    {
        // 数组用拼接做下标
        $index = $font . '-' . $size . '-' . $color;

        /*
         * 在这里就享元了。
         * 相同的文字样式，使用同一个对象。
         * 大大节省了空间
         */

        if (!isset(static::$characterStyleList[$index])) {
            static::$characterStyleList[$index] = new CharacterStyle($font, $size, $color);
        }
        return static::$characterStyleList[$index];
    }

}


/**
 * 文字
 *
 */
class Character
{
    private $char;

    /**
     * 文字样式
     *
     * @var CharacterStyle
     */
    private $characterStyle;

    public function __construct(string $char, CharacterStyle $characterStyle)
    {
        $this->char           = $char;
        $this->characterStyle = $characterStyle;
    }

}

// 编辑器
class Editor
{
    /**
     * @var array
     */
    private $charList;


    public function appendCharacter(string $char, string $font, int $size, string $color)
    {
        $this->charList[] = new Character($char, CharacterStyleFactor::getCharacterStyle($font, $size, $color));
    }
}