<?php
$newOrders = \app\models\Service::find()->count();
$newMessage = \app\modules\contact\entities\Contact::find()->count();
?>

<div class="admin-default-index">
    <h1 class="title">Панель Администратора</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Количество</th>
            <th scope="col">Просмотр</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Новые заказы</th>
            <td><?= $newOrders ?></td>
            <td><a href="<?=\yii\helpers\Url::to('/admin-back/order')?>" class="button button--primary">Перейти</a></td>
        </tr>
        <tr>
            <th scope="row">Обращения</th>
            <td><?= $newMessage ?></td>
            <td><a href="<?=\yii\helpers\Url::to('/admin-back/contact')?>" class="button button--primary">Перейти</a></td>
        </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <a href="<?=\yii\helpers\Url::to('/admin-back/default/clear-cash')?>" class="btn btn-primary">Очистить кэш</a>
        </div>
    </div>
</div>
