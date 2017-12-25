<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers;

use Yii;

/**
 * User agent helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class UserAgentHelper
{
    /**
     * @var null|string
     */
    private static $_cache;


    /**
     * This class should not be instantiated.
     */
    private function __construct()
    {
    }

    /**
     * Check whether user agent is a Google Page Speed Insights.
     * @see https://stackoverflow.com/questions/29162881
     *
     * @param bool $useCache
     * @return bool
     */
    public static function isGooglePageSpeed($useCache = true)
    {
        if (null === self::$_cache || false === $useCache) {
            $userAgent = Yii::$app->getRequest()->getUserAgent();
            self::$_cache = (null !== $userAgent) && (false !== stripos($userAgent, 'Speed Insights'));
        }

        return self::$_cache;
    }
}
