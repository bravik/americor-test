<?php

declare(strict_types=1);

namespace app\models\history\events\sms;

class IncomingSMSEvent extends AbstractSMSEvent
{
    public function getName(): string
    {
        return 'Incoming message';
    }
}
