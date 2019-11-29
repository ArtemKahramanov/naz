<?php

namespace app\widgets;

use app\entities\Category;
use yii\base\Widget;

class CategoryWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $top_categories = \Yii::$app->db->cache(function () {
            return Category::find()->orderBy(['sort' => SORT_ASC])->joinWith('seo')->all();
        }, 86400);

        return $this->render('category_widget', [
            'top_categories' => $top_categories
        ]);
    }
}
