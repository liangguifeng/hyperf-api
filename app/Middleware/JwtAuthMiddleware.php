<?php
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Middleware;

use Phper666\JwtAuth\Jwt;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Phper666\JwtAuth\Exception\TokenValidException;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;

class JwtAuthMiddleware implements MiddlewareInterface
{
    /**
     * @var HttpResponse
     */
    protected $response;

    protected $prefix = 'Bearer';

    protected $jwt;

    public function __construct(HttpResponse $response, Jwt $jwt)
    {
        $this->response = $response;
        $this->jwt      = $jwt;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $isValidToken = false;
        // 根据具体业务判断逻辑走向，这里假设用户携带的token有效
        $token = $request->getHeader('Authorization')[0] ?? '';

        if (strlen($token) > 0) {
            $token = ucfirst($token);
            $arr   = explode($this->prefix . ' ', $token);
            $token = $arr[1] ?? '';

            if (strlen($token) > 0 && $this->jwt->checkToken()) {
                $isValidToken = true;
            }
        }

        if ($isValidToken) {
            return $handler->handle($request);
        }

        throw new TokenValidException('对不起，token验证没有通过', 401);
    }
}
