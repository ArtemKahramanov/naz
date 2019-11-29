<?php

namespace app\views\widgets;

$this->registerJsFile('../script/owl.carousel.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile('../css/owl.carousel.min.css');
?>
<div class="owl-carousel owl-theme owl-loaded">
    <?php
    foreach ($last_product as $key => $product) { ?>
        <div class="product-slider">
            <div class="product-slider__content">
                <p class="text">Категория: <a
                        href="<?= \yii\helpers\Url::to(['category/view', 'slug' => $product->category->seo->slug]); ?>"
                        class="product-slider__category"><?= $product->category->name ?></a></p>
                <img src="/img/admin/<?= $product->photo ?>" class="product-slider__img"
                     alt="<?= $product->name ?>">
                <h5 class="title">
                    <a href="<?= \yii\helpers\Url::to(['product/view', 'slug' => $product->seo->slug]) ?>"><?= $product->name ?></a>
                </h5>
            </div>
            <div class="product-slider__footer">
                <a href="<?= \yii\helpers\Url::to(['product/view', 'slug' => $product->seo->slug]) ?>" class="button button--primary">Подробнее</a>
            </div>
        </div>
    <?php } ?>
</div>
