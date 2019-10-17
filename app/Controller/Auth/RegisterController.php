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
use App\Controller\Controller;
use App\Request\Auth\LoginRequest;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class RegisterController extends Controller
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
    public function register(LoginRequest $Loginrequest)
    {
        //表单验证
        $Loginrequest->validated();

        $userData = [
            'account' => $this->request->input('account'),
            'password' => password_hash($this->request->input('password'), PASSWORD_DEFAULT),
        ];

        $User = User::query()->where('account', $userData['account'])->first();

        if (empty($User->account)) {
            $user = User::query()->firstOrCreate($userData);

            return $this->success($user);
        }

        return $this->failed('创建用户失败');
    }
}
