<?php

namespace app\widgets;

use app\entities\Category;
use app\entities\Menu;
use yii\base\Widget;

class TopMenuWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menu = Menu::find()->joinWith(['page'])
                ->innerJoin('seo', 'text_page.id = seo.entity_id')
                ->addSelect('seo.slug, menu.*')
                ->where(['seo.entity_type' => 'app\entities\TextPage'])
                ->all();

        return $this->render('top-menu_widget', ['menu' => $menu]);
    }
}
