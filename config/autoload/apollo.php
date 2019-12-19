<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

return [
    'enable'     => false,
    'server'     => env('APOLLO_SERVER', 'http://127.0.0.1:8080'),
    'appid'      => 'Your APP ID',
    'cluster'    => 'default',
    'namespaces' => [
        'application',
    ],
    'interval' => 5,
];
