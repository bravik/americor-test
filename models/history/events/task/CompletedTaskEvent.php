<?php

declare(strict_types=1);

namespace app\models\history\events\task;

class CompletedTaskEvent extends AbstractTaskEvent
{
    public function getName(): string
    {
        return 'Task completed';
    }
}
