<?php

declare(strict_types=1);

namespace app\repositories;

use app\models\History;
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;
use yii\db\ActiveQuery;

class HistoryRecordsRepository
{
    public function dataProviderByCriteria(): DataProviderInterface
    {
        $query = History::find()
            ->select('history.*')
            ->with([
                'customer',
                'user',
                'sms',
                'task',
                'call',
                'fax',
            ])
        ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => [
                'ins_ts' => SORT_DESC,
                'id' => SORT_DESC
            ],
        ]);

        return $dataProvider;
    }

    public function dataProviderByCriteriaForExport(): DataProviderInterface
    {
        $query = History::find()
            ->select(['id', 'ins_ts', 'object', 'object_id', 'event', 'customer_id', 'user_id'])
            ->with([
                'user' => function (ActiveQuery $query) {
                    $query->select(['id', 'username']);
                },
                'sms' => function (ActiveQuery $query) {
                    $query->select(['id', 'message', 'phone_from', 'phone_to']);
                },
                'task' => function (ActiveQuery $query) {
                    $query->select(['id', 'title']);
                },
                'fax' => function (ActiveQuery $query) {
                    $query->select(['id']);
                },
                'call' => function (ActiveQuery $query) {
                    $query->select(['id', 'status', 'direction']);
                },
            ])
        ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => [
                'ins_ts' => SORT_DESC,
                'id' => SORT_DESC
            ],
        ]);

        return $dataProvider;
    }
}