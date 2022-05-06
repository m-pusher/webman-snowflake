<?php
namespace Mpusher\Snowflake;

use Godruoyi\Snowflake\Snowflake as Snow;
use Godruoyi\Snowflake\RedisSequenceResolver;
use think\facade\Cache;

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
     * setconfig
     *
     * @return void
     */
    public static function config(array $config = [], $workerId)
    {
        static::$snowflake = new Snow($config['data_center_id'], $workerId);
        static::$snowflake->setStartTimeStamp($config['start_time'] ?? strtotime('Y-m-d') * 1000);
        $redis = $config['redis'] ?? [];
        if (empty($redis)) {
            throw new \Exception('Snowflake: Redis Options Empty!!!');
        }
        $redis['type'] = 'redis';
        $seq = new RedisSequenceResolver(Cache::connect($redis)->handler());
        static::$snowflake->setSequenceResolver($seq);
    }

    /**
     * generate id
     *
     * @return string
     */
    public static function generate()
    {
        return self::$snowflake->id();
    }
}