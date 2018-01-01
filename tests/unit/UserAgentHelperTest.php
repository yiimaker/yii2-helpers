<?php
/**
 * @link https://github.com/yiimaker/yii2-helpers
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\helpers\tests\unit;

use Yii;
use yii\console\Request;
use yii\web\Request as WebRequest;
use ymaker\helpers\UserAgentHelper;

/**
 * Test case for User Agent helper.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class UserAgentHelperTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected function _before()
    {
        Yii::$container->set(Request::class, RequestMock::class);
    }

    public function testIsNotGooglePageSpeed()
    {
        RequestMock::$userAgent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.89 Safari/537.36';
        $this->assertFalse(UserAgentHelper::isGooglePageSpeed(false));
    }

    public function testIsGooglePageSpeed()
    {
        RequestMock::$userAgent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.8 (KHTML, like Gecko; Google Page Speed Insights) Chrome/19.0.1084.36 Safari/536.8';
        $this->assertTrue(UserAgentHelper::isGooglePageSpeed(false));
    }

    public function testCache()
    {
        // sets value to cache on first call
        RequestMock::$userAgent = 'Google Page Speed Insights';
        $this->assertTrue(UserAgentHelper::isGooglePageSpeed());

        // gets value from cache after first call
        RequestMock::$userAgent = 'This another user agent';
        $this->assertTrue(UserAgentHelper::isGooglePageSpeed());

        // sets new value to cache because "useCache" flag set to "false"
        $this->assertFalse(UserAgentHelper::isGooglePageSpeed(false));
    }
}

class RequestMock extends WebRequest
{
    public static $userAgent;

    public function getUserAgent()
    {
        return self::$userAgent;
    }
}
