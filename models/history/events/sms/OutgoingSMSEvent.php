<?php

declare(strict_types=1);

namespace app\models\history\events\sms;

class OutgoingSMSEvent extends AbstractSMSEvent
{
    public function getName(): string
    {
        return 'Outgoing message';
    }
}
