<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $order_products */
/* @var $payment */
/* @var $model app\entities\Order */

$count = 0;

$this->title = 'Заказ';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('danger')): ?>
    <div class="alert alert-success alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('danger'); ?>
    </div>
<?php endif; ?>

<div class="order-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_type',
            ['attribute' => 'user_id', 'label' => 'Почта', 'value' => $model->user['email']],
            ['attribute' => 'user_id', 'label' => 'Имя', 'value' => $model->user['name']],
            ['attribute' => 'user_id', 'label' => 'Телефон', 'value' => $model->user['phone']],
            ['attribute' => 'payment', 'label' => 'Оплата', 'value' => \app\entities\Payment::checkStatus($model->id) ? 'Оплачено' : 'В ожидании'],
            ['attribute' => 'price', 'label' => 'Цена', 'value' => $model->price],
            'status.name',
            'created_at'
        ],
    ]) ?>

    <h2 class="title">Товары</h2>
    <table class="table table-white table-hover">
        <thead class="thead-light">
        <tr class="active">
            <th>Фото</th>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Итого</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order_products as $order_product) {
            $product = \app\entities\Product::find()->where(['id' => $order_product->product_id])->one();
            $count += $product->price * $order_product->count;
            ?>
            <tr>
                <td><?= Html::img("/img/admin/{$product->photo}", ['alt' => $product->name, 'width' => 50, 'height' => 50]) ?></td>
                <td><?= $product->name ?></td>
                <td><?= $order_product->count ?></td>
                <td><span class="price"><?= $product->price * $order_product->count ?></span></td>
            </tr>
        <?php } ?>
        <tr class="active">
            <td colspan="1">Общая сумма:</td>
            <td colspan="2"><span class="price cart-price"><?= $count ?></span></td>
            <td colspan="1">
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Изменить статус
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php foreach (\app\entities\Status::find()->all() as $status) {
                            if ($model->status_id !== $status->id) {
                                ?>
                                <a href="<?= Url::to(['change-status', 'id' => $model->id, 'status_id' => $status->id]); ?>"
                                   class="dropdown-item"><?= $status->name ?></a>
                            <?php }
                        } ?>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <?php if ($model->payment_type === 'online') { ?>
        <h2 class="title">Оплата</h2>
        <table class="table table-white table-hover">
            <thead class="thead-light">
            <tr class="active">
                <th>Номер платежа</th>
                <th>Транзакция Yandex</th>
                <th>Сумма</th>
                <th>Статус</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($payment as $item) { ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->payment_id ?></td>
                    <td><?= $item->amount ?></td>
                    <td><?= $item->status ?></td>
                    <td><?= $item->created_at ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
