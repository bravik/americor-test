<?php

declare(strict_types=1);

namespace app\models\history\events\call;

class OutgoingCallEvent extends AbstractCallEvent
{
    public function getName(): string
    {
        return 'Outgoing call';
    }
}
