<?php

/**
 * @var $event \app\models\history\events\call\AbstractCallEvent
 */

$call = $event->getCall();

$answered = $call && $call->isAnswered();

echo $this->render('_item_common', [
    'user' => $event->getUser(),
    'content' => $call->comment ?? '',
    'body' => Yii::t('events', $event->getMessage()->getKey(), $event->getMessage()->getParams()),
    'footerDatetime' => $event->getTimestamp(),
    'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
    'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
    'iconIncome' => $answered && $call->isIncoming(),
]);