<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Разделы', 'options' => ['class' => 'header']],
                    ['label' => 'РУП', 'icon' => 'fas fa-book', 'url' => ['rup/index']],
                    ['label' => 'ППС', 'icon' => 'fas fa-group', 'url' => ['teacher/index']],
                    ['label' => 'Пед. нагрузка', 'icon' => 'fas fa-group', 'url' => ['teachers-load/index']],
                    ['label' => 'Группы', 'icon' => 'fas fa-group', 'url' => ['group/index']],
                    ['label' => 'Студенты', 'icon' => 'fas fa-user', 'url' => ['student/index']],
                    ['label' => 'Специальность', 'icon' => 'fas fa-book', 'url' => ['specialty/index']],
                    ['label' => 'Допалнительно', 'options' => ['class' => 'header']],
                    ['label' => 'Дисциплины', 'icon' => 'fas fa-book', 'url' => ['subject/index']],
                    ['label' => 'Типы дисциплин', 'icon' => 'fas fa-book', 'url' => ['subject-type/index']],
                    ['label' => 'Модули', 'icon' => 'fas fa-book', 'url' => ['module/index']],
                    ['label' => 'Компоненты', 'icon' => 'fas fa-book', 'url' => ['component/index']],
                    ['label' => 'Направ. образования', 'icon' => 'fas fa-book', 'url' => ['education/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
