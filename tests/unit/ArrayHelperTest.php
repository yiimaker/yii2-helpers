<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers\tests\unit;

use ymaker\helpers\ArrayHelper;

/**
 * Test case fpr Array helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ArrayHelperTest extends TestCase
{
    /**
     * @var array
     */
    private $_array = [
        'first'     => 1,
        'second'    => 2,
        'third'     => 3,
    ];

    public function testNextKey()
    {
        $this->assertEquals('second', ArrayHelper::nextKey('first', $this->_array));
        $this->assertEquals('third', ArrayHelper::nextKey('second', $this->_array));
        $this->assertNull(ArrayHelper::nextKey('third', $this->_array));
    }

    public function testPrevKey()
    {
        $this->assertEquals('second', ArrayHelper::prevKey('third', $this->_array));
        $this->assertEquals('first', ArrayHelper::prevKey('second', $this->_array));
        $this->assertNull(ArrayHelper::prevKey('first', $this->_array));
    }
}
