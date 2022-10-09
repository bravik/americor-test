<?php

use app\models\History;
use app\models\history\events\call\IncomingCallEvent;
use app\models\history\events\call\OutgoingCallEvent;
use app\models\history\events\customer\CustomerChangedQualityEvent;
use app\models\history\events\customer\CustomerChangedTypeEvent;
use app\models\history\events\fax\IncomingFaxEvent;
use app\models\history\events\fax\OutgoingFaxEvent;
use app\models\history\events\sms\IncomingSMSEvent;
use app\models\history\events\sms\OutgoingSMSEvent;
use app\models\history\events\task\CompletedTaskEvent;
use app\models\history\events\task\CreatedTaskEvent;
use app\models\history\events\task\UpdatedTaskEvent;

/**
 * Events map for History records
 */
return [
    History::EVENT_CREATED_TASK             => CreatedTaskEvent::class,
    History::EVENT_COMPLETED_TASK           => CompletedTaskEvent::class,
    History::EVENT_UPDATED_TASK             => UpdatedTaskEvent::class,
    History::EVENT_INCOMING_SMS             => IncomingSMSEvent::class,
    History::EVENT_OUTGOING_SMS             => OutgoingSMSEvent::class,
    History::EVENT_CUSTOMER_CHANGE_TYPE     => CustomerChangedTypeEvent::class,
    History::EVENT_CUSTOMER_CHANGE_QUALITY  => CustomerChangedQualityEvent::class,
    History::EVENT_INCOMING_CALL            => IncomingCallEvent::class,
    History::EVENT_OUTGOING_CALL            => OutgoingCallEvent::class,
    History::EVENT_INCOMING_FAX             => IncomingFaxEvent::class,
    History::EVENT_OUTGOING_FAX             => OutgoingFaxEvent::class,
];
