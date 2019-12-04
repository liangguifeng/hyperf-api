<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

use Hyperf\View\Mode;
use Hyperf\View\Engine\BladeEngine;

return [
    // 使用的Blade模板引擎
    'engine' => BladeEngine::class,
    // 不填写则默认为 Task 模式，推荐使用 Task 模式
    'mode'   => Mode::TASK,
    'config' => [
        // 若下列文件夹不存在请自行创建
        'view_path'  => BASE_PATH . '/storage/view/',
        'cache_path' => BASE_PATH . '/runtime/view/',
    ],
];
