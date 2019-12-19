<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

use Hyperf\HttpServer\Router\Router;

Router::get('/', 'App\Controller\WelcomeController@index');
Router::post('/login', 'App\Controller\Auth\LoginController@login');
Router::post('/register', 'App\Controller\Auth\RegisterController@register');

Router::addGroup('/api', function () {
    Router::get('/user', 'App\Controller\UserController@index');
    Router::put('/user', 'App\Controller\UserController@update');
}, [
    'middleware' => [App\Middleware\JwtAuthMiddleware::class],
]);
