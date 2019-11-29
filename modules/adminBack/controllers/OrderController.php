<?php

namespace app\modules\adminBack\controllers;

use app\entities\OrderProduct;
use app\entities\Payment;
use Yii;
use app\entities\Order;
use app\entities\OrderSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends AdminController
{

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $order_products = OrderProduct::find()->where(['order_id' => $id])->all();
        $payment_models = Payment::find()->where(['order_id' => $id])->all();
        $client = Payment::getClient();
        foreach ($payment_models as $item) {
            $payment = $client->getPaymentInfo($item->payment_id);
            $item->status = $payment->status;
            $item->save();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'order_products' => $order_products,
            'payment' => $payment_models
        ]);
    }


    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::find()->where(['order.id' => $id])->joinWith('status')->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChangeStatus($id, $status_id)
    {
        $order = $this->findModel($id);
        $order->status_id = $status_id;
        if ($order->validate()) {
            $order->save();
            Yii::$app->session->setFlash('success', 'Статус изменен');
        } else {
            Yii::$app->session->setFlash('danger', 'Произошла ошибка');
        }
        return $this->actionView($id);
    }
}
