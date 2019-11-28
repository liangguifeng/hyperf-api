<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Request\Auth;

use Hyperf\Validation\Request\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 定义规则.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'account'  => 'required|digits:11',
            'password' => 'required|min:6|max:16|alpha_num',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'account.required'    => '账号不能为空',
            'account.digits'      => '账号必须为手机号且不能超过11个字符',
            'password.required'   => '密码不能为空',
            'password.max'        => '密码不能超过16个字符',
            'password.min'        => '密码不能小于6个字符',
            'password.alpha_num'  => '密码必须是字母或数字',
        ];
    }
}
