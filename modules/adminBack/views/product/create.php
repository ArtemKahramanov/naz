<?php
/* @var $this yii\web\View */
/* @var $model app\entities\Product */

$this->title = 'Созадть';
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'unit' => $unit,
    ]) ?>

</div>
