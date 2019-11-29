<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\entities\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Меню';
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
<div class="menu-index">


    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'icon_class',
            ['attribute' => 'page_id', 'label' => 'Страница', 'value' => 'page.name'],

            $editButtons,
        ],
    ]); ?>
</div>
