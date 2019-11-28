<?php
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Exception\Handler;

use Throwable;
use Hyperf\Di\Annotation\Inject;
use Psr\Http\Message\ResponseInterface;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Phper666\JwtAuth\Exception\JWTException;
use Hyperf\ExceptionHandler\ExceptionHandler;

class JWTExceptionHandler extends ExceptionHandler
{
    /**
     * @Inject
     *
     * @var \Hyperf\HttpServer\Contract\ResponseInterface as httpResponse
     */
    protected $httpResponse;

    /**
     * 异常处理.
     *
     * @param Throwable         $throwable
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // 判断被捕获到的异常是希望被捕获的异常
        if ($throwable instanceof JWTException) {
            // 格式化输出
            $data = json_encode([
                'code'    => $throwable->getCode(),
                'message' => $throwable->getMessage(),
            ], JSON_UNESCAPED_UNICODE);

            // 阻止异常冒泡
            $this->stopPropagation();

//            这里我不想让他报 "Internal Server Error."这个错误，所以返回错误信息
//            return $response->withStatus(500)->withBody(new SwooleStream($data));

            //自定义异常处理
            return $this->httpResponse->json(['message' => 'Token获取失败', 'code' => 500, 'data' => $data]);
        }

        return $response;
    }

    /**
     * 是否对异常进行处理.
     *
     * @param Throwable $throwable
     *
     * @return bool
     */
    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
