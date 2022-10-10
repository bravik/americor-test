<?php

declare(strict_types=1);

namespace app\models\history\events;

use app\models\History;

class EventsFactory
{
    /**
     * @var array<string,class-string<EventInterface>>
     */
    private $eventsMap;

    /**
     * @var class-string<EventInterface>
     */
    private $genericEvent;

    /**
     * @param  array<string,class-string<EventInterface>> $eventsMap
     * @param  class-string<EventInterface> $genericEvent
     */
    public function __construct(array $eventsMap, string $genericEvent)
    {
        $this->eventsMap    = $eventsMap;
        $this->genericEvent = $genericEvent;
    }

    public function createFromHistoryRecord(History $record): EventInterface
    {
        $eventClass = $this->eventsMap[$record->event] ?? $this->genericEvent;

        return $eventClass::createFromHistoryRecord($record);
    }
}