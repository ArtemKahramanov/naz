<?php

use app\widgets\CategoryWidget;
use yii\bootstrap4\ActiveForm;


?>
<?php echo \app\modules\call\widgets\CallWidget::widget(['product_id' => $service->id]) ?>

<div class="container product mb">
    <div class="row">
        <div class="col-md-12 product__right" itemscope itemtype="http://schema.org/Product">
            <h1 class="title text-center" itemprop="name"><?= $service->name ?></h1>
            <div class="row product__row">
                <div class="col-md-6 product__photo">
                    <img src="/img/admin/<?= $service->photo ?>" alt="<?= $service->name ?>" itemprop="image">
                </div>
                <div class="col-md-6 product__info" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <div class="buy">
                        <div class="pr"><b><?= $service->price ?></b></div>
                    </div>
                    <button class="button" data-toggle="modal" data-target="#callModalWindow">Связаться с исполнителем</button>

                </div>
            </div>
            <?php if (!empty($service->desc)) { ?>
                <?= $service->desc ?>
            <?php } ?>
        </div>
    </div>

</div>
