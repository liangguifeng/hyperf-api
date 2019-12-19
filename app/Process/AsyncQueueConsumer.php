<?php

declare(strict_types = 1);
/**
 * This file is form http://findcat.cn
 *
 * @link     http://findcat.cn
 * @email    1476982312@qq.com
 */

namespace App\Process;

use Hyperf\Process\Annotation\Process;
use Hyperf\AsyncQueue\Process\ConsumerProcess;

/**
 * @Process
 */
class AsyncQueueConsumer extends ConsumerProcess
{
}
