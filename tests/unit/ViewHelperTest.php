<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers\tests\unit;

use ymaker\helpers\ViewHelper;

/**
 * Test case for View helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class ViewHelperTest extends TestCase
{
    public function testSideCssClass()
    {
        $expected = ['right', 'left', 'right', 'left-block', 'right-block'];
        $actual = [];

        for ($i = 0; $i < 3; $i++) {
            $actual[] = ViewHelper::sideCssClass();
        }

        for ($i = 0; $i < 2; $i++) {
            $actual[] = ViewHelper::sideCssClass('right-block', 'left-block');
        }

        $this->assertEquals($expected, $actual);
    }

    public function testIsLast()
    {
        $total = 3;

        $this->assertFalse(ViewHelper::isLast($total));
        $this->assertFalse(ViewHelper::isLast($total));
        $this->assertTrue(ViewHelper::isLast($total));
    }

    public function testZeroNumber()
    {
        $expected = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10'];
        $actual = [];

        for ($i = 0; $i < count($expected); $i++) {
            $actual[] = ViewHelper::zeroNumber($i);
        }

        $this->assertEquals($expected, $actual);
    }

    public function testEvenNumber()
    {
        $expected = [0, 2, 4, 6, 8, 10];
        $actual = [];

        for ($i = 0; $i < count($expected); $i++) {
            $actual[] = ViewHelper::evenNumber();
        }

        $this->assertEquals($expected, $actual);
    }

    public function testOddNumber()
    {
        $expected = [1, 3, 5, 7, 9, 11];
        $actual = [];

        for ($i = 0; $i < count($expected); $i++) {
            $actual[] = ViewHelper::oddNumber();
        }

        $this->assertEquals($expected, $actual);
    }
}
