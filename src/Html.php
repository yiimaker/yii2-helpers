<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers;

use yii\helpers\BaseHtml;

/**
 * Extended default Html helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Html extends BaseHtml
{
    /**
     * This class should not be instantiated.
     */
    private function __construct()
    {
    }

    /**
     * Generates a callto hyperlink.
     *
     * @see mailto()
     *
     * @param string        $phone
     * @param null|string   $text
     * @param array         $options
     *
     * @return string
     */
    public static function callTo($phone, $text = null, $options = [])
    {
        $options['href'] = 'tel:' . preg_replace('/(\s|-)+/', '', $phone);
        $text = (null === $text) ? $phone : $text;

        return static::tag('a', $text, $options);
    }
    
    /**
     * Generates safe hyperlink to external resource.
     *
     * @param string    $text
     * @param string    $url
     * @param array     $options
     *
     * @return string
     */
    public static function externalLink($text, $url, $options = [])
    {
        $options['rel'] = 'noopener';
        $options['target'] = '_blank';
        $options['href'] = $url;

        return static::tag('a', $text, $options);
    }

    /**
     * Returns HTML wrapped in to `noindex` comment.
     *
     * @param string $html
     *
     * @return string
     */
    public static function wrapToNoIndex($html)
    {
        return '<!--noindex-->' . $html . '<!--/noindex-->';
    }

    /**
     * Returns HTML wrapped into `<noindex>` tag.
     *
     * @param string $html
     *
     * @return string
     */
    public static function wrapToNoIndexTag($html)
    {
        return '<noindex>' . $html . '</noindex>';
    }
}
