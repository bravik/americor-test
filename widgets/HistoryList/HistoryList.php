<?php

namespace app\widgets\HistoryList;

use app\models\search\HistorySearch;
use app\repositories\HistoryRecordsRepository;
use app\widgets\Export\Export;
use Yii;
use yii\base\Widget;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class HistoryList extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $model = new HistorySearch();

        $model->load(Yii::$app->request->queryParams);

        if (!$model->validate()) {
            $dataProvider = new ArrayDataProvider([]);
        } else {
            $historyRecordsRepository = Yii::$container->get(HistoryRecordsRepository::class);
            $dataProvider = $historyRecordsRepository->dataProviderByCriteria();
        }

        return $this->render('main', [
            'model' => $model,
            'linkExport' => $this->getLinkExport(),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    private function getLinkExport()
    {
        $params = Yii::$app->getRequest()->getQueryParams();
        $params = ArrayHelper::merge([
            'exportType' => Export::FORMAT_CSV
        ], $params);
        $params[0] = 'site/export';

        return Url::to($params);
    }
}
