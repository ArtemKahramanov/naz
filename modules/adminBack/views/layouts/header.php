<?php

use yii\helpers\Html;

$newOrders = \app\models\Service::find()->count();
$newMessage = \app\modules\contact\entities\Contact::find()->count();

?>

<header class="main-header">
    <?= Html::a('<span class="logo-mini">ML</span><span class="logo-lg">' . 'Metall SS' . '</span>', '/admin-back', ['class' => 'logo']) ?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span class="label label-success"><?= $newOrders ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Количество новых заказов: <?= $newOrders ?> </li>
                    </ul>
                </li>

                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa fa-envelope"></i>
                        <span class="label label-warning"><?= $newMessage ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Количество обращений: <?= $newMessage ?></li>
                    </ul>
                </li>
                <li>
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <a href="<?php echo \yii\helpers\Url::to(['/user/security/logout']) ?>" data-method="post"
                           class="btn-logout"><i class="fas fa-sign-out-alt"></i> Выход
                            (<?= Yii::$app->user->identity->username; ?>)</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
