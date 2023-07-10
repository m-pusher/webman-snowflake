<?php
namespace Mpusher\Snowflake;

class Bootstrap implements \Webman\Bootstrap
{
    // 进程启动时调用
    public static function start($worker)
    {
        Snowflake::config(config($worker->id ?? 0, 'plugin.mpusher.snowflake.app.snowflake'));
    }
}