<?php

use app\widgets\CategoryWidget;
use \yii\helpers\Html;
use \yii\helpers\Url;

/* @var $category */
/* @var $provider */

?>
<div class="container catalog">
    <h1 class="title">Архив</h1>
    <div class="archive-row">
        <?php foreach ($archives as $category) { ?>
            <div class="archive">
                <div class="archive__img">
                    <img src="/img/admin/<?= $category->photo ?>" class="catalog-block__img">
                </div>
                <div class="archive__content">
                    <h3 class="mb-3"><?= $category->service->name ?></h3>
                    <p class="price"><b><?= $category->price ?></b></p>
                    <p class="date">Дата окончания: <?= $category->date ?></p>
                    <p>Пользователь: <?= $category->user->username ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
