<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\entities\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$editButtons = ['class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {delete}',
    'buttons' => [
        'view' => function ($url, $model) {
            return Html::a(
                '<i class="far fa-eye"></i>',
                $url);
        },
    ],
];

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'payment_type',
            ['attribute' => 'user_id', 'label'=>'Пользователь', 'value'=>'user.email'],
            ['attribute' => 'price', 'label'=>'Цена', 'value'=>'price'],
            ['attribute' => 'status_id', 'label'=>'Статус', 'value'=>'status.name', 'filter' => \yii\helpers\ArrayHelper::map(\app\entities\Status::find()->all(), 'id', 'name')],
            'created_at',

            $editButtons
        ],
    ]); ?>
</div>
