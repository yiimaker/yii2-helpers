<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers;

use yii\helpers\BaseArrayHelper;

/**
 * Extended default Array helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class ArrayHelper extends BaseArrayHelper
{
    /**
     * This class should not be instantiate.
     */
    private function __construct()
    {
    }

    /**
     * Returns next key of element in array.
     *
     * @param int|string    $currentKey
     * @param array         $array
     *
     * @return int|string|null Returns null if element with current key was last.
     */
    public static function nextKey($currentKey, array $array)
    {
        reset($array);
        do {
            $tmpKey = key($array);
            if (false === next($array)) {
                return null;
            }
        } while ($tmpKey !== $currentKey);

        return key($array);
    }

    /**
     * Returns prev key of element in array.
     *
     * @param int|string    $currentKey
     * @param array         $array
     *
     * @return int|string|null Returns null if element with current key was first.
     */
    public static function prevKey($currentKey, array $array)
    {
        end($array);
        do {
            $tmpKey = key($array);
            if (false === prev($array)) {
                return null;
            }
        } while ($tmpKey !== $currentKey);

        return key($array);
    }
}
