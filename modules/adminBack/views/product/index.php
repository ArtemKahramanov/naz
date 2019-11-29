<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\entities\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
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
<div class="product-index">

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'price',
            'sort',
            ['attribute' => 'category_id', 'label' => 'Категория', 'value' => 'category.name',
                'filter' => \yii\helpers\ArrayHelper::map(\app\entities\Category::find()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'active',
                /**
                 * Формат вывода.
                 * В этом случае мы отображает данные, как передали.
                 * По умолчанию все данные прогоняются через Html::encode()
                 */
                'format' => 'raw',
                /**
                 * Переопределяем отображение фильтра.
                 * Задаем выпадающий список с заданными значениями вместо поля для ввода
                 */
                'filter' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Да' : 'Нет',
                        [
                            'class' => 'badge badge-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],

            $editButtons
        ],
    ]); ?>
</div>
