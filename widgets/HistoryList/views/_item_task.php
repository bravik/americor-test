<?php

/**
 * @var $event \app\models\history\events\task\AbstractTaskEvent
 */

$task = $event->getTask();

echo $this->render('_item_common', [
    'user' => $event->getUser(),
    'body' => Yii::t('events', $event->getMessage()->getKey(), $event->getMessage()->getParams()),
    'iconClass' => 'fa-check-square bg-yellow',
    'footerDatetime' => $event->getTimestamp(),
    'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
]);