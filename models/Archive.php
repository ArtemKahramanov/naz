<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archive".
 *
 * @property int $id
 * @property int $service_id
 * @property string $date
 * @property int $user_id
 * @property string $photo
 *
 * @property Service $service
 */
class Archive extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archive';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'user_id'], 'required'],
            [['service_id', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['price'], 'double'],
            [['photo'], 'string', 'max' => 255],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'service_id' => 'Услуга',
            'date' => 'Дата',
            'user_id' => 'Исполнитель',
            'photo' => 'Фото',
            'price' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\dektrium\user\models\User::className(), ['id' => 'user_id']);
    }
}
