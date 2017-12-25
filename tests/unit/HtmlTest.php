<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers\tests\unit;

use ymaker\helpers\Html;

/**
 * Test case for Html helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class HtmlTest extends TestCase
{
    public function testCallTo()
    {
        $expected = '<a href="tel:0(00)0000000">Call to us</a>';
        $actual = Html::callTo('0 (00) 000 0000', 'Call to us');
        $this->assertEquals($expected, $actual);

        $expected = '<a href="tel:0(00)0000000">Call to us</a>';
        $actual = Html::callTo('0-(00)-000-0000', 'Call to us');
        $this->assertEquals($expected, $actual);

        $expected = '<a href="tel:0(00)0000000">0 (00) 000 0000</a>';
        $actual = Html::callTo('0 (00) 000 0000');
        $this->assertEquals($expected, $actual);
    }

    public function testExternalLink()
    {
        $expected = '<a href="https://test.example" rel="noopener" target="_blank">External link</a>';
        $actual = Html::externalLink('External link', 'https://test.example');

        $this->assertEquals($expected, $actual);
    }

    public function testWrapToNoIndex()
    {
        $expected = '<!--noindex--><p>Test HTML code</p><!--/noindex-->';
        $actual = Html::wrapToNoIndex('<p>Test HTML code</p>');

        $this->assertEquals($expected, $actual);
    }

    public function testWrapToNoIndexTag()
    {
        $expected = '<noindex><p>Test HTML code</p></noindex>';
        $actual = Html::wrapToNoIndexTag('<p>Test HTML code</p>');

        $this->assertEquals($expected, $actual);
    }
}
