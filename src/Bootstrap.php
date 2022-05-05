<?php
namespace Mpusher\Snowflake;

class Bootstrap implements \Webman\Bootstrap
{
    // 进程启动时调用
    public static function start($worker)
    {
        Snowflake::config(config('plugin.mpusher.snowflake.app.snowflake'), $worker->id ?? 0);
    }
}