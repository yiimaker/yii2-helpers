<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers;

/**
 * View helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ViewHelper
{
    /**
     * This class should not be instantiate.
     */
    private function __construct()
    {
    }

    /**
     * Returns side CSS class for block.
     * This method should use in loops.
     *
     * @param string $right CSS class for right block.
     * @param string $left CSS class for left block.
     * @return string
     */
    public static function sideCssClass($right = 'right', $left = 'left')
    {
        static $index = 0;
        return ($index++ % 2 == 0) ? $right : $left;
    }

    /**
     * Check whether is last iteration of the loop.
     *
     * @param int $total
     * @return bool
     */
    public static function isLast($total)
    {
        static $current = 0;
        return (++$current) === $total;
    }

    /**
     * If number less than 9 before this number will be added zero.
     *
     * @param int|string $number
     * @return string
     */
    public static function zeroNumber($number)
    {
        return ($number < 10) ? ('0' . $number) : $number;
    }

    /**
     * Generates even numbers.
     *
     * @return int Returns even number.
     */
    public static function evenNumber()
    {
        static $number = 0;
        $current = $number;
        $number += 2;

        return $current;
    }

    /**
     * Generates odd numbers.
     *
     * @return int Returns add number.
     */
    public static function oddNumber()
    {
        static $number = 1;
        $current = $number;
        $number += 2;

        return $current;
    }
}
