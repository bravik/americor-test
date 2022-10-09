<?php

declare(strict_types=1);

namespace app\models\history\events\task;

use app\models\history\events\AbstractEvent;
use app\models\history\events\Message;
use app\models\Task;

abstract class AbstractTaskEvent extends AbstractEvent
{
    public function getMessage(): Message
    {
        return new Message(
            'task',
            [
                'eventName' => $this->getName(),
                'taskTitle' => $this->getTask()->title ?? 'Deleted'
            ]
        );
    }

    public function getTemplate(): string
    {
        return '_item_task';
    }

    /**
     * @return ?Task
     */
    public function getTask()
    {
        return $this->historyRecord->task;
    }
}
