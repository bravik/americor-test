<?php

use app\models\history\events\EventsFactory;

/**
 * @var $model \app\models\History
 */

$eventsFactory = \Yii::$container->get(EventsFactory::class);

$event = $eventsFactory->createFromHistoryRecord($model);

echo $this->render($event->getTemplate(), [
    'event' => $event,
]);
