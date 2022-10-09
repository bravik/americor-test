<?php

use app\models\Sms;

/**
 * @var $event \app\models\history\events\sms\AbstractSMSEvent
 */

$sms = $event->getSms();

echo $this->render('_item_common', [
    'user' => $event->getUser(),
    'body' => Yii::t('events', $event->getMessage()->getKey(), $event->getMessage()->getParams()),
    'footer' => $sms->direction === Sms::DIRECTION_INCOMING ?
        Yii::t('app', 'Incoming message from {number}', [
            'number' => $sms->phone_from ?? ''
        ]) : Yii::t('app', 'Sent message to {number}', [
            'number' => $sms->phone_to ?? ''
        ]),
    'iconIncome' => $sms->direction === Sms::DIRECTION_INCOMING,
    'footerDatetime' => $event->getTimestamp(),
    'iconClass' => 'icon-sms bg-dark-blue'
]);