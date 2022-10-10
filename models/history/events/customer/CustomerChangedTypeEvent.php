<?php

declare(strict_types=1);

namespace app\models\history\events\customer;

use app\models\History;
use app\models\history\events\EventInterface;
use app\models\history\events\Message;

class CustomerChangedTypeEvent extends AbstractCustomerAttributesChangedEvent
{
    public function getName(): string
    {
        return 'Property changed';
    }

    public static function createFromHistoryRecord(History $record): EventInterface
    {
        $event = parent::createFromHistoryRecord($record);

        $event->attribute = 'type';

        return $event;
    }

    public function getMessage(): Message
    {
        return new Message(
            'customer-type-changed',
            [
                'event' => $this->getName(),
                'oldValue' => $this->getOldValue(),
                'newValue' => $this->getNewValue(),
            ]
        );
    }
}