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
     * 获取用户信息.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     */
    public function index()
    {
        //获取token中的用户数据
        $user = $this->jwt->getParserData();

        $userInfo = User::query()->where('account', $user['account'])->get();

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

    /**
     * 用户更新资料.
     *
     * @return array
     */
    public function update()
    {
        //获取token中的用户数据
        $user = $this->jwt->getParserData();

        $data = [
            'avatar' => $this->request->input('avatar'),
            'gender' => $this->request->input('gender'),
            'email'  => $this->request->input('email'),
            'mobile' => $this->request->input('mobile'),
        ];

        $userInfo = User::query()->where('account', $user['account'])->update($data);

        if ($userInfo == 1) {
            return $this->success([$userInfo], '更新资料成功！');
        }

        return $this->failed('更新资料失败！');
    }
}
