<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1; maximum-scale=2; user-scalable=0;">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/cons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/cons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/cons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/cons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/cons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <!--    <link rel="manifest" href="/icons/manifest.json">-->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo \app\modules\contact\widgets\ContactWidget::widget([]) ?>

<div class="wrapper">
    <header class="container header">
        <div class="header__row">
            <a href="/"><img src="/img/logo.png" class="logo__img" width="200"
                 alt="logo"></a>
            <nav class="navigate">
                <button class="button button--menu"><i class="fas fa-bars"></i></button>
                <ul class="list list--menu">
                    <li class="list__item"><a href="/" class="link">Главная</a></li>
                    <li class="list__item"><a href="/service" class="link">Виды работ и услуги</a></li>
                    <li class="list__item"><a href="<?=Url::to(['/o-kompanii'])?>" class="link">Смета</a></li>
                    <li class="list__item"><a href="/archive" class="link">Архив</a></li>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <li class="list__item"><a href="/user/security/login" class="link" itemprop="url"><i class="fas fa-user-lock"></i>
                                Войти</a></li>
                        <li class="list__item"><a href="/user/registration/register" class="link" itemprop="url"><i
                                        class="fas fa-user"></i>
                                Регистрация</a></li>
                    <?php } else { ?>
                        <li class="list__item"><a href="<?= \yii\helpers\Url::to(['/user/settings/profile']) ?>" class="link">
                                <i class="fas fa-user"></i>
                                Личный кабинет</a></li>
                        <li class="list__item"><a href="<?= \yii\helpers\Url::to(['/user/security/logout']) ?>" data-method="post"
                                                  class="link">
                                <i class="fas fa-sign-out-alt"></i>
                                Выход</a></li>
                    <?php } ?>
                </ul>
        </div>
        <div class="info-header">
            <div class="info-header__text">
                Строительство, ремонтные работы.
            </div>
            <ul class="list list--none">
                <li class="list__item">
                    <i class="fas fa-phone"></i>
                    <a href="tel:+79041343142341"
                       class="link"
                       itemprop="telephone">+79041343142341</a>
                </li>
                <li class="list__item">
                    <i class="fas fa-phone"></i>
                    <a href="tel:+79041343142341"
                       class="link"
                       itemprop="telephone">+79041343142341</a>
                </li>
            </ul>
        </div>
    </header>
    <!--    <header class="header" itemscope itemtype="http://schema.org/WPHeader">-->
    <!--        <meta itemprop="headline" content="Metall-SS">-->
    <!--        <meta itemprop="description"-->
    <!--              content="На сайте металлобазы Metall-SS вы можете купить металл и металлопрокат в Москве. Широкий ассортимент, высокое качество, выгодные цены.">-->
    <!--        <div class="container">-->
    <!--            <div class="header__row">-->
    <!--                <a href="--><? //= \yii\helpers\Url::to('/'); ?><!--" class="logo">-->
    <!--                    <img src="/img/logo.svg" class="logo__img" width="250"-->
    <!--                         alt="logo">-->
    <!--                </a>-->
    <!---->
    <!--                <div class="search">-->
    <!--                    --><?php //echo \app\widgets\SearchWidget::widget([]) ?>
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </header>-->

    <div class="content">
        <div class="container">
            <div id="contact-form-success" class="alert-success alert alert-dismissible hidden" role="alert">
                Сообщение успешно отправлено!
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>
            <?= Breadcrumbs::widget([
                'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                'homeLink' => [
                    'label' => 'Главная',
                    'url' => Yii::$app->homeUrl,
                    'class' => 'breadcrumb-item',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"pages\">{link}</li>\n",
            ]) ?>
            <?= Alert::widget() ?>
        </div>
        <?= $content ?>
    </div>


    <div class="container">
        <footer class="footer" itemscope itemtype="http://schema.org/WPFooter">
            <ul class="list list--no-icon">
                <li><a href="/" class="link"><b>Станкопром-Л</b></a></li>
                <li><i class="fas fa-map-marker-alt"></i>Старый Оскол</li>
            </ul>
            <ul class="list list--none">
                <li><a href="tel:790041414123"> <i
                            class="fas fa-phone"></i> +790041414123 </a></li>
                <li><a href="mailto:mail.ru" target="_blank">
                        <i class="fas fa-envelope"></i> mail.ru </a></li>
                <li><a href="#" data-toggle="modal" data-target="#contactModalWindow">
                        <i class="fas fa-pen"></i> Написать нам</a></li>
            </ul>
        </footer>
    </div>
</div>
<!-- {/literal} END JIVOSITE CODE -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
