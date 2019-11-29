<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use \kartik\tree\TreeViewInput;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\entities\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bd-example">
    <div class="modal fade" id="unitModal" tabindex="-1" role="dialog" aria-labelledby="unitModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Добавить единицу измерения</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'id' => 'unit-form',
                        'enableAjaxValidation' => true,
                        'validationUrl' => 'validate-unit',
                    ]); ?>
                    <?= $form->field($unit, 'name')->textInput(); ?>
                    <?php echo Html::submitButton('Добавить', ['class' => 'btn btn-success']); ?>
                    <?php $form->end(); ?>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
               aria-controls="nav-home" aria-selected="true">Основные</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
               aria-controls="nav-profile" aria-selected="false">Seo</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="product-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'category_id')->widget(TreeViewInput::className(), ([
                    'name' => 'kvTreeInput',
                    'value' => 'false', // preselected values
                    'query' => \app\entities\Category::find()->addOrderBy('root, lft'),
                    'headingOptions' => ['label' => 'Категории'],
                    'rootOptions' => ['label' => '<i class="fas fa-tree text-success"></i>'],
                    'fontAwesome' => false,
                    'asDropdown' => true,
                    'multiple' => false,
                    'options' => ['disabled' => false]
                ])); ?>

                <?= $form->field($model, 'description')->widget(Widget::className(), [
                    'settings' => [
                        'lang' => 'ru',
                        'minHeight' => 200,
                        'plugins' => [
                            'clips',
                            'fullscreen',
                        ],
                    ],
                ]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'sort')->input('number', ['min' => 0]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'unit_id')->dropDownList(ArrayHelper::map(\app\entities\Unit::find()->all(), 'id', 'name'),
                            [
                                'prompt' => 'Выбор значения',
                            ]
                        ) ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitModal">
                            Добавить значение
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mb align-center">
                <div class="col-sm-6">
                    <?= $form->field($model, 'photo')->fileInput(['multiple' => 'multiple', 'id' => 'sortpicture']) ?>
                    <div class="hidden">
                        <?= $form->field($model, 'photo')->textInput(['id' => 'photo_img', 'type' => 'hidden']) ?>
                    </div>
                    <button class="btn btn-primary img-btn" id="upload">Загрузить изображение</button>
                </div>
                <div class="col-sm-6 block-image">
                    <?php if (!empty($model->photo)): ?>
                        <?php $path = Yii::getAlias('/img/admin/') . $model->photo; ?>
                        <img src="<?= $path; ?>" alt="image" width="300">
                    <?php endif; ?>
                </div>
            </div>
            <?= $form->field($model, 'active')->checkbox() ?>
        </div>

        <?php echo $this->render('@app/modules/adminBack/views/seo_params/view', [
            'form' => $form,
            'model' => $model,
        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
<?php
$image_js = <<<JS
var type = 'category';
$('.img-btn').on('click', function(event) {
    event.stopPropagation(); // Остановка происходящего
    event.preventDefault();  // Полная остановка происходящего
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
          url: '/upload/upload',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              var response = JSON.parse(php_script_response);
              alert(response.message);
              var photo = response.path;
              $('#photo_img').val(photo);
              $('.block-image img').attr("src",'/img/admin/'+response.path);
          }
     });
});
$('#unitModal').on('show.bs.modal', function (event) {
  $('.wrapper').css('display', 'block');  
  var button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно  
  var recipient = button.data('whatever'); // Извлечение информации из данных-* атрибутов  
  var modal = $(this);
  modal.find('.modal-title').text('New message to ' + recipient);
  modal.find('.modal-body input').val(recipient);
});
$('#unit-form').on('beforeSubmit', function () {
  var data = $(this).serialize();
  var options = '';
	 $.ajax({
	    url: 'create-unit',
	    type: 'POST',
	    data: data,
	    success: function(res){
           var response = JSON.parse(res);
                alert('Добавлено!');
                for (var i = 0; i < response.length; i++){
                    options += '<option value =' + response[i].id + '>' + response[i].name + '</option>';
                }
                $('#unitModal').modal('toggle');
                $('#product-unit_id').html(options);
           },
	     error: function(res){
	        alert('Произошла ошибка');
	     }
	 });
	 return false;
})
JS;
$this->registerJs($image_js);
?>
