<?php

/**
 * @var $event \app\models\history\events\GenericEvent
 */

echo $this->render('_item_common', [
    'user' => $event->getUser(),
    'body' => Yii::t('events', $event->getMessage()->getKey(), $event->getMessage()->getParams()),
    'bodyDatetime' => $event->getTimestamp(),
    'iconClass' => 'fa-gear bg-purple-light'
]);