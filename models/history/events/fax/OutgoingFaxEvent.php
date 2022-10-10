<?php

declare(strict_types=1);

namespace app\models\history\events\fax;

class OutgoingFaxEvent extends AbstractFaxEvent
{
    public function getName(): string
    {
        return 'Outgoing fax';
    }
}
