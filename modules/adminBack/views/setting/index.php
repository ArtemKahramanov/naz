<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\entities\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$editButtons = ['class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {delete}',
    'buttons' => [
        'update' => function ($url, $model) {
            return Html::a(
                '<i class="far fa-edit"></i>',
                $url);
        },
    ],
];

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'value',

            $editButtons,
        ],
    ]); ?>
</div>
