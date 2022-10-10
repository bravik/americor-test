<?php

use yii\helpers\Html;

/**
 * @var $event \app\models\history\events\fax\AbstractFaxEvent
 */

$fax = $event->getFax();

echo $this->render('_item_common', [
    'user' => $event->getUser(),
    'body' => Yii::t('events', $event->getMessage()->getKey(), $event->getMessage()->getParams()) .

        (isset($fax->document) ? ' - ' . Html::a(
            Yii::t('app', 'view document'),
            $fax->document->getViewUrl(),
            [
                'target' => '_blank',
                'data-pjax' => 0
            ]
        ) : ''),
    'footer' => Yii::t('app', '{type} was sent to {group}', [
        'type' => Yii::t('events', 'fax-type', ['type' => $fax->type ?? null]),
        'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
    ]),
    'footerDatetime' => $event->getTimestamp(),
    'iconClass' => 'fa-fax bg-green'
]);