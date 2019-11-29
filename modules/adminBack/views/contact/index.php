<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\entities\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$editButtons = ['class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {delete}',
    'buttons' => [
        'view' => function ($url, $model) {
            return Html::a(
                '<i class="far fa-eye"></i>',
                $url);
        },
        'delete' => function ($url, $model) {
            $options = [
                'data-confirm' => Yii::t('yii', 'Вы уверены что хоите удалить сообщение?'),
                'method' => 'get',
            ];
            $icon = Html::tag('i', '', ['class' => "far fa-trash-alt"]);

            return Html::a($icon, $url, $options);
        },
    ],
];

$this->title = 'Обращения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'mail',
            'body:ntext',
            'created_at',

            $editButtons
        ],
    ]); ?>
</div>
