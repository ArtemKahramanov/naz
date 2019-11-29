<?php

namespace app\controllers;

use app\models\Archive;
use yii\web\Controller;

class ArchiveController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $services = Archive::find()->all();
        return $this->render('index', [
            'archives' => $services,
        ]);
    }

}
