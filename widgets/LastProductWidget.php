<?php

namespace app\widgets;

use app\entities\Product;
use yii\base\Widget;

class LastProductWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $last_product = Product::find()
            ->active()
            ->with(['category', 'seo', 'category.seo'])
            ->limit(3)
            ->orderBy('sort')
            ->all();

        return $this->render('last-product_widget', [
            'last_product' => $last_product,
        ]);
    }
}
