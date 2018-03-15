<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
        <!-- search form
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
         /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Admin Specta', 'options' => ['class' => 'header']],
                    ['label' => Yii::t('app','Dashboard'), 'icon' => 'fa fa-dashboard', 'url' => ['/site/index']],
                    ['label' => 'Pelanggan', 'icon' => 'users','url' => ['/pelanggan/index'],'visible'=>Yii::$app->user->identity->isAdmin],
                		#['label' => 'Teknisi', 'url' => ['/teknisi/index'],'visible'=>Yii::$app->user->identity->isAdmin],
                    ['label' => 'Teknisi', 'icon' => 'male','url' => ['/teknisi/index'],'visible'=>Yii::$app->user->identity->isTeknisi or Yii::$app->user->identity->isAdmin],
                		['label' => 'Servis', 'icon' => 'wrench','url' => ['/servis/index'],'visible'=>Yii::$app->user->identity->isAdmin],
                    ['label' => 'Order', 'icon' => 'reorder', 'url' => ['/orders/index'],'visible'=>Yii::$app->user->identity->isAdmin],
                		['label' => 'Pembayaran', 'icon' => 'credit-card','url' => ['/pembayaran/index'],'visible'=>Yii::$app->user->identity->isAdmin],
                		['label' => 'History', 'icon' => 'history','url' => ['/history_log/index'],'visible'=>Yii::$app->user->identity->isAdmin],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Dev tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
