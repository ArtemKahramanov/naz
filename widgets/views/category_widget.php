<?php

namespace app\views\widgets;

use app\widgets\CategoryWidget;

/* @var $top_categories */
?>

<aside class="category-aside" itemscope itemtype="https://schema.org/WebSite">
    <?php
    $count = 0;
    foreach ($top_categories as $category) {
        if ($category->isRoot()) {
            $root = $category;
            $count++; ?>
            <div class="accordion category-aside__block" id="accordionExample<?= $count ?>">
                <div class="card">
                    <div class="card-header category-aside__head" id="heading<?= $count ?>">
                        <div class="mb-0 category-aside__head-info">
                            <a href="<?= \yii\helpers\Url::to(['category/view', 'slug' => $category->seo->slug]); ?>"
                               class="category-aside__title" itemprop="name">
                                <?= $category->name ?>
                            </a>
                            <?php if (!$category->isLeaf()) { ?>
                                <button class="btn btn-link" type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse<?= $count ?>"
                                        aria-controls="collapse<?= $count ?>"
                                        aria-expanded="true">
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    foreach ($top_categories as $children) {
                        if ($children->isChildOf($root)) { ?>
                            <ul class="list list--category collapse show" aria-labelledby="heading<?= $count ?>"
                                id="collapse<?= $count ?>">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['category/view', 'slug' => $children->seo->slug]); ?>">
                                        <?= $children->name ?>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</aside>
