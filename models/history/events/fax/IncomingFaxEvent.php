<?php

declare(strict_types=1);

namespace app\models\history\events\fax;

class IncomingFaxEvent extends AbstractFaxEvent
{
    public function getName(): string
    {
        return 'Incoming fax';
    }
}
