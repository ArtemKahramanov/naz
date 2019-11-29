<?php

namespace app\views\widgets;

use yii\helpers\Url;

/* @var $menu */
?>

<?php foreach ($menu as $item) { ?>
    <li class="list__item">
        <a href="<?= Url::to(['/text-page/view', 'slug' => $item->slug]) ?>"
           class="link" itemprop="url"><i class="fas fa-<?= $item->icon_class ?>"></i> <?= $item->name ?> </a>
    </li>
<?php } ?>
