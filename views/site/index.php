<?php
/* @var $top_categories */
$this->title = 'Старый оскол';
$this->registerMetaTag(['name' => 'description', 'content' => 'Старый Оскол']);
$this->registerJsFile('script/jquery.spincrement.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('script/wow.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('script/animate.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="yandex-map"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <iframe src="https://yandex.ru/map-widget/v1/-/CGgWFGIN" frameborder="1" allowfullscreen="true" width="100%" height="450"></iframe>
        </div>
    </div>
</div>
<?php echo \app\modules\call\widgets\CallWidget::widget([]) ?>

<div class="container position-relative">
    <div class="line"></div>

    <div class="banner">
        <div class="banner__left">
            <h1 class="title title--max">Сделать ремонт стало проще!</h1>
            <p class="banner__desc">Вам больше не нужно ждать!</p>
        </div>
        <img src="img/fotr.png" alt="" class="banner__img">
    </div>

    <div class="advantage-row">
        <div class="advantage">
            <img src="/img/delivery.svg" alt="" class="advantage__img" width="70">
            <p class="advantage__text">Проводим работы по всей територии РФ и странам СНГ</p>
        </div>
        <div class="advantage">
            <img src="/img/garantia.svg" alt="" class="advantage__img" width="70">
            <p class="advantage__text">Строго соблюдаем гарантийные обязательства</p>
        </div>
        <div class="advantage">
            <img src="/img/online_bye.png" alt="" class="advantage__img" width="70">
            <p class="advantage__text">Широкий выбор услуг для решения Ваших задач</p>
        </div>
    </div>
    <div class="text-center">
        <button id="quize" class="button button--catalog">Пройдите опрос и получите скидку</button>
    </div>
    <section class="buy-info">
        <h2 class="title text-center">Причины для оставлния заявки</h2>
        <div class="row mb">
            <div class="col-md-4 buy-info__block wow slideInLeft">
                <i class="fas fa-map-marker-alt"></i>
                <h3 class="title title--info">Далеко находитесь?</h3>
                <hr class="buy-info__line">
                <p class="text">Наш специалист приедет в любую точку</p>
            </div>
            <div class="col-md-4 buy-info__block wow slideInLeft">
                <i class="fas fa-money-bill"></i>
                <h3 class="title title--info">Ограничен бюджет?</h3>
                <hr class="buy-info__line">
                <p class="text">Мы готовы сделать скидку!</p>
            </div>
            <div class="col-md-4 buy-info__block wow slideInLeft">
                <i class="fas fa-truck"></i>
                <h3 class="title title--info">Предоставим фото деталей</h3>
                <hr class="buy-info__line">
                <p class="text">Вы можете заказать фото или видео деталей</p>
            </div>
        </div>
    </section>
</div>
<div class="statistic mb" id="counts">
    <div class="container">
        <div class="row">
            <div class="col-md-3 justify-content-center">
                <span class="statistic__title spincrement1">30</span>
                <p class="statistic__desc">Более 30 видов оказваемых услуг</p>
            </div>
            <div class="col-md-3">
                <span class="statistic__title spincrement2">20</span>
                <p class="statistic__desc">более 20 лет опыта работы</p>
            </div>
            <div class="col-md-3">
                <span class="statistic__title spincrement3">1500</span>
                <p class="statistic__desc">производственная площадь более 1500 м²</p>
            </div>
        </div>
    </div>
</div>
<div class="container mb last-products">
<!--    --><?php //echo \app\widgets\LastProductWidget::widget([]) ?>
</div>
<div class="container mb">
    <h2 class="title text-center">Наши контакты:</h2>
    <section class="about-company row">
        <div class="col-md-6 wow bounceInLeft" data-wow-duration="2s">
            <img src="/img/map.png" class="map-image" alt="Карта" width="100%" height="450">
        </div>
        <div class="col-md-6 about-company__info wow bounceInRight" data-wow-duration="2s" itemscope
             itemtype="http://schema.org/Organization">
            <h4 itemprop="name">Компания</h4>
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <p class="text">Центральный офис: <span itemprop="addressLocality"></span>
                    <span
                        itemprop="streetAddress">Адрес</span></p>
            </div>
            <ul class="list list--contacts">
                <li>Телефоны:
                    <a href="tel:89004005687" itemprop="telephone">89004005687</a>,
                    <a href="tel:89004005687" itemprop="telephone">89004005687</a>
                <li>E-mail: <a href="mailto:mail.ru" target="_blank"
                               itemprop="email">mail.ru</a></li>
            </ul>

            <p class="text">
                Для того, что бы отправить нам письмо со своими вопросами и пожеланиями воспользуйтесь формой
                обратной
                связи.
            </p>
            <button class="button" data-toggle="modal" data-target="#callModalWindow">Заказать звонок</button>

        </div>
    </section>
</div>

<?php
$js = <<<JS
    $('.map-image').click(function() {
        $('#yandex-map').modal('toggle');
    });
JS;
$this->registerJs($js);
?>
