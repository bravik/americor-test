<?php

namespace app\controllers;

use app\models\search\HistorySearch;
use app\repositories\HistoryRecordsRepository;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        $model = new HistorySearch();

        $model->load(Yii::$app->request->queryParams);

        if (!$model->validate()) {
            // TODO Display errors
            throw new BadRequestHttpException();
        }

        Yii::$container->get(HistoryRecordsRepository::class);

        $historyRecordsRepository = Yii::$container->get(HistoryRecordsRepository::class);
        $dataProvider = $historyRecordsRepository->dataProviderByCriteriaForExport();

        return $this->render('export', [
            'dataProvider' => $dataProvider,
            'exportType' => $exportType,
            'model' => $model
        ]);
    }
}
