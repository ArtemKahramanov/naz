<?php

namespace app\controllers;

use app\models\Service;
use yii\web\Controller;
use yii\web\Response;

class ProductController extends Controller
{
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionView($id)
    {
        $service = Service::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'service' => $service
        ]);
    }

}
