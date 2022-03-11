<?php
declare(strict_types = 1);

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

