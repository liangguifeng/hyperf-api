<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Controller\Auth;

use App\Model\User;
use Phper666\JwtAuth\Jwt;
use Psr\Container\ContainerInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class LoginController
{
    protected $container;

    protected $jwt;

    /**
     * 通过构造函数注入JWT.
     *
     * IndexController constructor.
     *
     * @param ContainerInterface $container
     * @param Jwt                $jwt
     */
    public function __construct(Jwt $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * 用户登录.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function login(RequestInterface $request, ResponseInterface $response)
    {
        $user = User::query()->where('username', $request->input('username'))->first();

        if (password_verify($request->input('password'), $user->password)) {
            $userData = [
                'id'       => $user->id,
                'username' => $user->username,
            ];

            $token = $this->jwt->getToken($userData);
            $data  = [
                'code' => 0,
                'msg'  => 'success',
                'data' => [
                    'token' => (string) $token,
                    'exp'   => $this->jwt->getTTL(),
                ],
            ];

            return $response->json($data);
        }

        return $response->json(['code' => 0, 'msg' => '登录失败', 'data' => []]);
    }
}
