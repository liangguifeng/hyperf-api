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
use App\Request\Auth\LoginRequest;
use App\Controller\AbstractController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class RegisterController extends AbstractController
{
    /**
     * 用户注册.
     *
     * @param LoginRequest      $Loginrequest
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return array
     */
    public function register(LoginRequest $Loginrequest, RequestInterface $request, ResponseInterface $response)
    {
        $Loginrequest->validated();

        $userData = [
            'username' => $request->input('username'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ];

        $User = User::query()->where('username', $userData['username'])->first();

        if (empty($User)) {
            $user = User::query()->firstOrCreate($userData);

            return $this->success($user);
        }

        return $this->fail('创建用户失败');
    }
}
