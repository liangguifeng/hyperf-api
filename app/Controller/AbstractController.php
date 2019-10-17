<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Psr\Container\ContainerInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

abstract class AbstractController
{
    /**
     * @Inject
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * @Inject
     *
     * @var ResponseInterface
     */
    protected $response;

    /**
     * 请求成功返回通用格式.
     *
     * @param $data
     *
     * @return array
     */
    public function success($data)
    {
        return [
            'code' => 0,
            'msg'  => 'success',
            'data' => [
                $data,
            ],
        ];
    }

    /**
     * 请求失败 返回通用格式.
     *
     * @param $data
     *
     * @return array
     */
    public function fail($data)
    {
        return [
            'code' => 1,
            'msg'  => 'error',
            'data' => [
                $data,
            ],
        ];
    }
}
