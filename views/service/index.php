<?php

use app\widgets\CategoryWidget;
use \yii\helpers\Html;
use \yii\helpers\Url;

/* @var $category */
/* @var $provider */

?>
<div class="container catalog">
    <h1 class="title">Услуги</h1>
    <div class="catalog-row">
        <?php foreach ($services as $category) { ?>
            <a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $category->id]); ?>" class="catalog-block">
                <div class="catalog-block__img">
                    <img src="/img/admin/<?= $category->photo ?>" class="catalog-block__img" alt="<?= $category->name ?>">
                </div>
                <h3 class="title title--category"><?= $category->name ?></h3>
            </a>
        <?php } ?>
    </div>
</div>
