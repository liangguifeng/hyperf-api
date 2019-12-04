<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Controller;

use Hyperf\View\RenderInterface;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController
 */
class WelcomeController
{
    /**
     * Blade首页渲染.
     *
     * @param RenderInterface $render
     *
     * @return mixed
     */
    public function index(RenderInterface $render)
    {
        return $render->render('index', ['name' => 'Hyperf']);
    }
}
