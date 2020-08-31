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
                    ['label' => 'Компоненты', 'icon' => 'fas fa-book', 'url' => ['component/index']],
                    ['label' => 'Образование', 'icon' => 'fas fa-book', 'url' => ['education/index']],
                    ['label' => 'Группы', 'icon' => 'fas fa-group', 'url' => ['group/index']],
                    ['label' => 'Модули', 'icon' => 'fas fa-book', 'url' => ['module/index']],
                    ['label' => 'РУП', 'icon' => 'fas fa-book', 'url' => ['rup/index']],
                    ['label' => 'Специальность', 'icon' => 'fas fa-book', 'url' => ['specialty/index']],
                    ['label' => 'Студенты', 'icon' => 'fas fa-user', 'url' => ['student/index']],
                    ['label' => 'Дисциплины', 'icon' => 'fas fa-book', 'url' => ['subject/index']],
                    ['label' => 'Типы дисциплин', 'icon' => 'fas fa-book', 'url' => ['subject-type/index']],
                    ['label' => 'Преподаватели', 'icon' => 'fas fa-group', 'url' => ['teacher/index']],
                    ['label' => 'Пед. Нагрузка', 'icon' => 'fas fa-group', 'url' => ['teachers-load/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
