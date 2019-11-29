<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\entities\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\entities\TextPage::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Выбор страницы',
        ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
