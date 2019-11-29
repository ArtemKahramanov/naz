<?php

namespace app\controllers;

use app\models\Service;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ServiceController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $services = Service::find()->all();
        return $this->render('index', [
            'services' => $services,
        ]);
    }

}
