<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

return [
    'handler' => [
        'http' => [
            App\Exception\Handler\AppExceptionHandler::class,
            App\Exception\Handler\JWTExceptionHandler::class,
            Hyperf\Validation\ValidationExceptionHandler::class,
            App\Exception\Handler\TokenValidExceptionHandler::class,
        ],
    ],
];
