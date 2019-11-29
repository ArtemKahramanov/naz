<?php

namespace app\modules\adminBack\controllers;

use app\entities\Category;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends AdminController
{
    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $category = Category::find();

        return $this->render('index', [
            'category' => $category
        ]);
    }

}
