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
use App\Controller\Controller;
use Hyperf\Di\Annotation\Inject;

class LoginController extends Controller
{
    /**
     * @Inject
     *
     * @var Jwt
     */
    protected $jwt;

    /**
     * 用户登录.
     *
     * @return array
     */
    public function login()
    {
        $user = User::query()->where('account', $this->request->input('account'))->first();

        //验证用户账户密码
        if (!empty($user->password) && password_verify($this->request->input('password'), $user->password)) {
            $userData = [
                'id'       => $user->id,
                'account'  => $user->account,
            ];

            //更新用户登录时间
            User::query()->where('account', $this->request->input('account'))->update([
                'last_time' => date('Y-m-d H:i:s'),
            ]);

            $token = $this->jwt->getToken($userData);
            $data  = [
                'token' => (string) $token,
                'exp'   => $this->jwt->getTTL(),
            ];

            return $this->success($data);
        }

        return $this->failed('登录失败');
    }
}
