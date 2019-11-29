<?php

namespace app\modules\adminBack\controllers;

use app\entities\Category;
use app\entities\Product;
use app\entities\Seo;
use yii\console\Controller;
use yii\console\ExitCode;
use PhpOffice\PhpSpreadsheet\IOFactory;


class DefaultController extends AdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRenderSlug()
    {
        $categories = Category::find()->leaves()->all();
        $products = Product::find()->all();

        foreach ($categories as $category) {
            $parent = $category->parents(1)->one();
            if (!empty($parent)) {
                $parent_slug = Seo::find()->where(['entity_id' => $parent->id, 'entity_type' => 'app\entities\Category'])->one();
                $seo = Seo::find()->where(['entity_id' => $category->id, 'entity_type' => 'app\entities\Category'])->one();
                $seo->slug = $parent_slug->slug . '/' . $seo->slug;
                if (!$seo->save()) {
                    var_dump($seo->getErrors());
                    die;
                }
            }
        }

        foreach ($products as $product) {
            $category = Category::find()->where(['id' => $product->category_id])->one();
            $category_seo = Seo::find()->where(['entity_id' => $category->id, 'entity_type' => 'app\entities\Category'])->one();
            $product_seo = Seo::find()->where(['entity_id' => $product->id, 'entity_type' => 'app\entities\Product'])->one();
            $product_seo->slug = $category_seo->slug . '/' . $product_seo->slug;
            if (!$product_seo->save()) {
                var_dump($product_seo->getErrors());
                die;
            }
        }
    }

    public function actionSlug()
    {
        $seo = Seo::find()->where(['entity_type' => 'app\entities\Category'])->orWhere(['entity_type' => 'app\entities\Product'])->all();

        foreach ($seo as $item) {
            $check = strpos($item->slug, '/');
            if ($check === false) {
                continue;
            } else {
                $s = explode('/', $item->slug);
                $slug = end($s);
                $item->slug = $slug;
                $item->save();
            }
        }
    }

    public function actionClearCash()
    {
        \Yii::$app->cache->flush();
//        \Yii::$app->session->setFlash('success', 'Кэщ очищен');
        return $this->redirect('/admin-back');
    }
}
