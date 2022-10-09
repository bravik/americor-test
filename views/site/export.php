<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\History
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $exportType string
 */

use app\models\History;
use app\models\history\events\EventsFactory;
use app\widgets\Export\Export;

$filename = 'history';
$filename .= '-' . time();

ini_set('max_execution_time', 0);
ini_set('memory_limit', '2048M');

$eventsFactory = \Yii::$container->get(EventsFactory::class);

echo Export::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'ins_ts',
            'label' => Yii::t('app', 'Date'),
            'format' => 'datetime'
        ],
        [
            'label' => Yii::t('app', 'User'),
            'value' => static function (History $model) {
                return isset($model->user) ? $model->user->username : Yii::t('app', 'System');
            }
        ],
        [
            'label' => Yii::t('app', 'Type'),
            'value' => static function (History $model) {
                return $model->object;
            }
        ],
        [
            'label' => Yii::t('app', 'Event'),
            'value' => static function (History $model) use ($eventsFactory)  {
                return Yii::t('events', $eventsFactory->createFromHistoryRecord($model)->getName());
            }
        ],
        [
            'label' => Yii::t('app', 'Message'),
            'value' => static function (History $model) use ($eventsFactory) {
                $message = $eventsFactory->createFromHistoryRecord($model)->getMessage();
                return strip_tags(Yii::t('events', $message->getKey(), $message->getParams()));
            }
        ]
    ],
    'exportType' => $exportType,
    'batchSize' => 2000,
    'filename' => $filename
]);