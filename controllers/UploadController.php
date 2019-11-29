<?php

namespace app\controllers;

use app\entities\Product;
use Yii;
use yii\web\UploadedFile;
use yii\web\Controller;
use GuzzleHttp\Client; // подключаем Guzzle


class UploadController extends Controller
{

    const IMG_PATH = '@app/web/img/admin/';

    public function actionUpload()
    {
        $image = UploadedFile::getInstanceByName('file');
        if (!empty($image)) {
            $image_file_type = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
            $allowed = ['png', 'jpg', 'gif', 'jpeg'];
            if (in_array($image_file_type, $allowed)) {
                $path = Yii::getAlias(self::IMG_PATH);
                $name = md5(microtime() . rand(0, 9999));
                $img = $name . '.' . $image->extension;
                $image->saveAs($path . $img);
                $answer_arr = [
                    'path' => $img,
                    'message' => 'Изображение сохранено'
                ];
                $answer = json_encode($answer_arr);
                return $answer;
            }
        }
        $answer_arr = [
            'path' => '',
            'message' => 'Произошла ошибка'
        ];
        $answer = json_encode($answer_arr);
        return $answer;
    }

}
