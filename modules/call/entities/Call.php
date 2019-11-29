<?php

namespace app\modules\call\entities;

use app\entities\Product;
use app\models\Service;
use dektrium\user\models\User;
use yii\base\Model;
use YandexCheckout\Client;

class Call extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'call';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['name', 'comment'], 'string'],
            [['name'], 'string', 'min' => 2, 'max' => 200],
            [['phone'], 'trim'],
            [['phone'], 'string', 'min' => 6, 'max' => 45],
            [['product_id'], 'integer'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон',
            'name' => 'Имя',
            'created_at' => 'Дата добавления',
            'comment' => 'Коментарий',
            'product_id' => 'Вид услуги'
        ];
    }

    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'product_id']);
    }
}
