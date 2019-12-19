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
        'host'     => 'localhost',
        'port'     => 5672,
        'user'     => 'guest',
        'password' => 'guest',
        'vhost'    => '/',
        'pool'     => [
            'min_connections' => 1,
            'max_connections' => 10,
            'connect_timeout' => 10.0,
            'wait_timeout'    => 3.0,
            'heartbeat'       => -1,
        ],
        'params' => [
            'insist'             => false,
            'login_method'       => 'AMQPLAIN',
            'login_response'     => null,
            'locale'             => 'en_US',
            'connection_timeout' => 3.0,
            'read_write_timeout' => 6.0,
            'context'            => null,
            'keepalive'          => false,
            'heartbeat'          => 3,
        ],
    ],
];
