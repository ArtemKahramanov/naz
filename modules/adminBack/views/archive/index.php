<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArchiveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Архив';
$this->params['breadcrumbs'][] = $this->title;

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
        'delete' => function ($url, $model) {
            $options = [
                'data-confirm' => Yii::t('yii', 'Вы хотите удалить продукт?'),
            ];
            $icon = Html::tag('i', '', ['class' => "far fa-trash-alt"]);

            return Html::a($icon, $url, $options);
        },
    ],
];
?>
<div class="archive-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'service_id', 'value' => 'service.name'],
            'date',
            ['attribute' => 'user_id', 'value' => 'user.username'],
            'photo',
            //'price',

            $editButtons,
        ],
    ]); ?>


</div>
