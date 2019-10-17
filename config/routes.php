<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::post('/login', 'App\Controller\Auth\LoginController@login');
Router::post('/register', 'App\Controller\Auth\RegisterController@register');

Router::addGroup('/api', function () {
    Router::get('/user', 'App\Controller\IndexController@index');
    Router::get('/data', 'App\Controller\IndexController@getData');
}, [
    'middleware' => [Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]
]);
