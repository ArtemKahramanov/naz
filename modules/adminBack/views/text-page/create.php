<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\entities\TextPage */

$this->title = 'Добавить страницу';
$this->params['breadcrumbs'][] = ['label' => 'Текстовые страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
