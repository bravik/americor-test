<?php

declare(strict_types=1);

namespace app\models\history\events\task;

class UpdatedTaskEvent extends AbstractTaskEvent
{
    public function getName(): string
    {
        return 'Task updated';
    }
}
