<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

return [
    'default' => [
        'driver'         => Hyperf\AsyncQueue\Driver\RedisDriver::class,
        'channel'        => 'queue',
        'timeout'        => 2,
        'retry_seconds'  => 5,
        'handle_timeout' => 10,
        'processes'      => 1,
    ],
];
