<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

return [
    'http' => [
        Hyperf\Validation\Middleware\ValidationMiddleware::class,
        Hyperf\Session\Middleware\SessionMiddleware::class,
    ],
];
