<?php
/**
 * @link https://github.com/zhuravljov/yii2-queue
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace zhuravljov\yii\queue\amqp;

use zhuravljov\yii\queue\cli\Command as CliCommand;

/**
 * Manages application amqp-queue.
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class Command extends CliCommand
{
    /**
     * @var Queue
     */
    public $queue;

    /**
     * Listens amqp-queue and runs new jobs.
     * It can be used as demon process.
     */
    public function actionListen()
    {
        $this->queue->listen();
    }
}