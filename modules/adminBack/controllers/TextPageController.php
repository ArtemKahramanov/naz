<?php

namespace app\modules\adminBack\controllers;

use app\behaviors\SeoBehavior;
use app\entities\Seo;
use Yii;
use app\entities\TextPage;
use app\entities\TextPageSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TextPageController implements the CRUD actions for TextPage model.
 */
class TextPageController extends AdminController
{
    /**
     * Lists all TextPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TextPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TextPage model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TextPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TextPage();
        $model->attachBehavior('SeoBehavior', new SeoBehavior());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TextPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $seo = Seo::find()->where(['entity_id' => $id, 'entity_type' => 'product'])->one();
        if (empty($seo)) {
            $seo = new Seo();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'seo' => $seo
        ]);
    }

    /**
     * Deletes an existing TextPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $seo = Seo::find(['entity_id' => $id, 'entity_type' => 'product'])->one();
        $seo->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the TextPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TextPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TextPage::findOne($id)) !== null) {
            $model->attachBehavior('SeoBehavior', new SeoBehavior());
            $model->getData();
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
