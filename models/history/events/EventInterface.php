<?php

declare(strict_types=1);

namespace app\models\history\events;

use app\models\History;

interface EventInterface
{
    public static function createFromHistoryRecord(History $record): EventInterface;

    public function getName(): string;

    public function getMessage(): Message;

    public function getTemplate(): string;
}