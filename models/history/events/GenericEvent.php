<?php

declare(strict_types=1);

namespace app\models\history\events;

final class GenericEvent extends AbstractEvent
{
    public function getTemplate(): string
    {
        return '_item_generic';
    }

    public function getName(): string
    {
        return 'Generic event';
    }
}
