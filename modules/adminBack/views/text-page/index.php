<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\entities\TextPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$editButtons = ['class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {delete}',
    'buttons' => [
        'update' => function ($url, $model) {
            return Html::a(
                '<i class="far fa-edit"></i>',
                $url);
        },
        'view' => function ($url, $model) {
            return Html::a(
                '<i class="far fa-eye"></i>',
                $url);
        },
//        'delete' => function ($url, $model) {
//            $options = [
//                'data-confirm' => Yii::t('yii', 'Вы уверены что хотете удалить страницу?'),
//            ];
//            $icon = Html::tag('i', '', ['class' => "far fa-trash-alt"]);
//
//            return Html::a($icon, $url, $options);
//        },
    ],
];

$this->title = 'Текстовые страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-page-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
//            'body:ntext',

            $editButtons
        ],
    ]); ?>
</div>
