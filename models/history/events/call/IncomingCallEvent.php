<?php

declare(strict_types=1);

namespace app\models\history\events\call;

class IncomingCallEvent extends AbstractCallEvent
{
    public function getName(): string
    {
        return 'Incoming call';
    }
}
