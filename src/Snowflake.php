<?php
namespace Mpusher\Snowflake;

use Godruoyi\Snowflake\Snowflake as Snow;
use Godruoyi\Snowflake\RedisSequenceResolver;
use support\Redis;

/**
 * 雪花生成器
 *
 * @DateTime 2022-04-27
 */
class Snowflake
{
    /**
     * snowflake
     *
     * @var Snow
     */
    protected static $snowflake;

    /**
     * isSequenceResolverReady
     *
     * @var boolean
     */
    protected static $isSequenceResolverReady = false;

    /**
     * setconfig
     *
     * @return void
     */
    public static function config(array $config = [], $workerId)
    {
        static::$snowflake = new Snow($config['data_center_id'], $workerId);
        static::$snowflake->setStartTimeStamp($config['start_time'] ?? strtotime('Y-m-d') * 1000);
    }

    /**
     * generate id
     *
     * @return string
     */
    public static function generate()
    {
        if (self::$isSequenceResolverReady === false) {
            $seq = new RedisSequenceResolver(Redis::client());
            static::$snowflake->setSequenceResolver($seq);
            self::$isSequenceResolverReady = true;
        }
        return self::$snowflake->id();
    }
}