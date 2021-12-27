<?php
declare(strict_types=1);

/*
 * 需求：过滤敏感词汇
 */

interface SensitiveWordFilter
{
    /**
     * 过滤敏感词
     * @param string $content 过滤内容
     * @return bool
     */
    public function doFilter(string $content): bool;
}

// 色情词汇过滤
class SexyWordFilter implements SensitiveWordFilter
{
    public function doFilter(string $content): bool
    {
        // TODO: Implement doFilter() method.
        return false;
    }
}

// 广告词汇过滤
class AdsWordFilter implements SensitiveWordFilter
{
    public function doFilter(string $content): bool
    {
        // TODO: Implement doFilter() method.
        return false;
    }
}

// 政府的词汇过滤
class PoliticalWordFilter implements SensitiveWordFilter
{
    public function doFilter(string $content): bool
    {
        // TODO: Implement doFilter() method.
        return false;
    }
}

class SensitiveWordFilterChain
{
    /**
     * @var SensitiveWordFilter[]
     */
    private $sensitiveWordFilterList = [];

    public function addFilter(SensitiveWordFilter $sensitiveWordFilter)
    {
        $this->sensitiveWordFilterList[] = $sensitiveWordFilter;
    }


    /**
     * 过滤
     * @param string $content
     * @return bool
     */
    public function filter(string $content): bool
    {
        foreach ($this->sensitiveWordFilterList as $item) {
            if (!$item->doFilter($content)) {
                return false;
            }
        }

        return true;
    }
}

$sensitiveWordFilterChain = new SensitiveWordFilterChain();
$sensitiveWordFilterChain->addFilter(new SexyWordFilter());
$sensitiveWordFilterChain->addFilter(new AdsWordFilter());
$sensitiveWordFilterChain->addFilter(new PoliticalWordFilter());

// 过滤敏感词
$sensitiveWordFilterChain->filter('123');