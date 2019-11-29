<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\entities\TextPage */

$this->title = 'Редактировать: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Текстовые страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="text-page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
