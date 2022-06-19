<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin<b>Panel</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity ? Yii::$app->user->identity->username : 'Не указан' ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Разделы', 'header' => true],
                    ['label' => 'Учебный план', 'icon' => 'fas fa-book', 'url' => ['rup/index']],
                    ['label' => 'ППС', 'icon' => 'th', 'url' => ['teacher/index']],
                    ['label' => 'Пед. нагрузка', 'icon' => 'th', 'url' => ['teachers-load/index']],
                    ['label' => 'Группы', 'icon' => 'th', 'url' => ['group/index']],
                    ['label' => 'Студенты', 'icon' => 'fas fa-user', 'url' => ['student/index']],
                    ['label' => 'Кл. области образования', 'icon' => 'fas fa-book', 'url' => ['training-direction/index']],
                    ['label' => 'Допалнительно', 'header' => true],
                    ['label' => 'Дисциплины', 'icon' => 'fas fa-book', 'url' => ['subject/index']],
//                    ['label' => 'Типы дисциплин', 'icon' => 'fas fa-book', 'url' => ['subject-type/index']],
                    ['label' => 'Модули', 'icon' => 'fas fa-book', 'url' => ['module/index']],
                    ['label' => 'Циклы', 'icon' => 'fas fa-book', 'url' => ['component/index']],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>