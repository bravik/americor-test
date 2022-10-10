<?php

declare(strict_types=1);

namespace app\models\history\events;

use app\models\History;
use app\models\User;

abstract class AbstractEvent implements EventInterface
{
    /**
     * @var History
     */
    protected $historyRecord;

    private function __construct()
    {
    }

    /**
     * @return static
     */
    public static function createFromHistoryRecord(History $record): EventInterface
    {
        $self = new static();
        $self->historyRecord = $record;

        return $self;
    }

    public function getMessage(): Message
    {
        return new Message('generic', ['event' => $this->getName()]);
    }

    /**
     * @return ?User
     */
    public function getUser()
    {
        return $this->historyRecord->user;
    }

    public function getTimestamp(): string
    {
        return $this->historyRecord->ins_ts;
    }
}
