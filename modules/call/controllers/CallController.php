<?php

namespace app\modules\call\controllers;

use app\modules\call\entities\Call;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `contact` module
 */
class CallController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionSend()
    {
        $entity = new Call();
        $answer['status'] = false;
        if ($entity->load(Yii::$app->request->post())) {
            $date = date('Y-m-d H:i:s');
            $entity->created_at = $date;
            $entity->save();
//            $text = "Обращение из контактной формы
//            Телефон: $entity->mail,
//            Имя: $entity->name,
//            Сообщение: $entity->body
//            ";
//            sendTelegram::messageToTelegram($text);
            $answer['status'] = true;
            return json_encode($answer);
        }
        return json_encode($answer);
    }

}
