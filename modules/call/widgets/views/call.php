<?php

/* @var $entity app\entities\Contact */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     id="call-form-success"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title title--modal">Спасибо за обращение! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>В ближайшее время, наш менеджер свяжется с Вами</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="callModalWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Заказать звонок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin([
                    'id' => 'call-form'
                ]); ?>
            <div class="modal-body">
                <?= $form->field($call, 'name')->textInput() ?>
                <?= $form->field($call, 'phone')->input('tel') ?>
                <?= $form->field($call, 'product_id')->hiddenInput(['value' => $product_id])->label(false) ?>
                <?= $form->field($call, 'comment')->textarea(['rows' => 5]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button class="button button--primary">Отправить</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$js = <<<JS
    
$('#call-form').on('beforeSubmit', function (event) {
    var form_data = $('#call-form').serialize();
    $.ajax({
        url: '/call/call/send',
        cache: false,
        method: 'post',
        data: form_data,
        success: function (res) {
            var response = JSON.parse(res);
            if (response.status === true){
                $('#callModalWindow').modal('toggle');
                $('#call-form-success').modal('toggle');
            } else {
                alert('Произошла ошибка');
            }
        },
        error: function () {
            alert('Произошла ошибка');
        },
    });
}).on('submit', function (event) {
    event.stopPropagation();
    event.preventDefault();
    });

JS;
$this->registerJs($js);
?>
