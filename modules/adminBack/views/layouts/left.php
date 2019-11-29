<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Услуги', 'icon' => 'bars', 'url' => ['/admin-back/service']],
                    ['label' => 'Архив', 'icon' => 'bars', 'url' => ['/admin-back/archive']],
                    ['label' => 'Заказы', 'icon' => 'bars', 'url' => ['/admin-back/call']],
//                    ['label' => 'Товары', 'icon' => 'list', 'url' => ['/admin-back/product']],
//                    ['label' => 'Заказы', 'icon' => 'user', 'url' => ['/admin-back/order']],
//                    ['label' => 'Обращения', 'icon' => 'envelope', 'url' => ['/admin-back/contact']],
//                    ['label' => 'Меню', 'icon' => 'ellipsis-v', 'url' => ['/admin-back/menu']],
//                    ['label' => 'Текстовые страницы', 'icon' => 'pen-square', 'url' => ['/admin-back/text-page']],
//                    ['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/admin-back/setting']],
                ],
            ]
        ) ?>
    </section>
</aside>
