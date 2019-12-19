<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

use Hyperf\Server\Server;
use Hyperf\Server\SwooleEvent;

return [
    'mode'    => SWOOLE_PROCESS,
    'servers' => [
        [
            'name'      => 'http',
            'type'      => Server::SERVER_HTTP,
            'host'      => '0.0.0.0',
            'port'      => 9876,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                SwooleEvent::ON_REQUEST => [Hyperf\HttpServer\Server::class, 'onRequest'],
            ],
        ],
    ],
    'settings' => [
        'enable_coroutine'    => true,
        'worker_num'          => swoole_cpu_num(),
        'pid_file'            => BASE_PATH . '/runtime/hyperf.pid',
        'open_tcp_nodelay'    => true,
        'max_coroutine'       => 100000,
        'open_http2_protocol' => true,
        'max_request'         => 100000,
        'socket_buffer_size'  => 2 * 1024 * 1024,
        // Task Worker 数量，根据您的服务器配置而配置适当的数量
        'task_worker_num' => 8,
        // 因为 `Task` 主要处理无法协程化的方法，所以这里推荐设为 `false`，避免协程下出现数据混淆的情况
        'task_enable_coroutine' => false,
        // 静态资源
        'document_root'            => BASE_PATH . '/public',
        'static_handler_locations' => ['/'],
        'enable_static_handler'    => true,
    ],
    'callbacks' => [
        SwooleEvent::ON_BEFORE_START => [Hyperf\Framework\Bootstrap\ServerStartCallback::class, 'beforeStart'],
        SwooleEvent::ON_WORKER_START => [Hyperf\Framework\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
        SwooleEvent::ON_PIPE_MESSAGE => [Hyperf\Framework\Bootstrap\PipeMessageCallback::class, 'onPipeMessage'],
        SwooleEvent::ON_TASK         => [Hyperf\Framework\Bootstrap\TaskCallback::class, 'onTask'],
        SwooleEvent::ON_FINISH       => [Hyperf\Framework\Bootstrap\FinishCallback::class, 'onFinish'],
    ],
];
