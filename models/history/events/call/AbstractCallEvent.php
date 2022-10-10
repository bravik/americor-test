<?php

declare(strict_types=1);

namespace app\models\history\events\call;

use app\models\Call;
use app\models\history\events\AbstractEvent;
use app\models\history\events\Message;

abstract class AbstractCallEvent extends AbstractEvent
{
    public function getMessage(): Message
    {
        if (!$this->historyRecord->call){
            return new Message('call-deleted');
        }

        $totalDisposition = $this->historyRecord->call->getTotalDisposition(false);
        if ($totalDisposition) {
            return new Message(
                'call-with-disposition',
                [
                    'status' => $this->getCall()->totalStatusText,
                    'disposition' => $totalDisposition,
                ]
            );
        }

        return new Message(
            'call',
            [
                'status' => $this->getCall()->totalStatusText,
            ]
        );
    }

    /**
     * @return ?Call
     */
    public function getCall()
    {
        return $this->historyRecord->call;
    }

    public function getTemplate(): string
    {
        return '_item_call';
    }
}