<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Controller;

use App\Model\User;
use Phper666\JwtAuth\Jwt;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class UserController extends Controller
{
    /**
     * @Inject
     *
     * @var Jwt
     */
    protected $jwt;

    /**
     * 获取用户信息
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     */
    public function getUserInfo()
    {
        //获取token中的用户数据
        $user = $this->jwt->getParserData();

        $userInfo = User::query()->where('username', $user['username'])->get();

        $data = $userInfo->map(function ($userInfo) {
            return [
                'id'         => $userInfo->id,
                'username'   => $userInfo->username,
                'avatar'     => $userInfo->avatar,
                'email'      => $userInfo->email,
                'mobile'     => $userInfo->mobile,
                'created_at' => $userInfo->created_at->toDateTimeString(),
            ];
        });

        return $this->success($data);
    }
}
