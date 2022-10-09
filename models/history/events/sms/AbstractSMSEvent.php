<?php

declare(strict_types=1);

namespace app\models\history\events\sms;

use app\models\history\events\AbstractEvent;
use app\models\history\events\Message;
use app\models\Sms;

abstract class AbstractSMSEvent extends AbstractEvent
{
    public function getMessage(): Message
    {
        return new Message(
            'sms',
            [
                'smsText' => $this->historyRecord->sms->message ?: '',
            ]
        );
    }

    /**
     * @return ?Sms
     */
    public function getSms()
    {
        return $this->historyRecord->sms;
    }

    public function getTemplate(): string
    {
        return '_item_sms';
    }
}