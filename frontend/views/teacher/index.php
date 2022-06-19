<?php

use common\models\Teacher;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Преподаватели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?php $columns = [
            ['class' => 'yii\grid\SerialColumn'],

<<<<<<< HEAD
        'surname',
        'name',
        'patronymic',
        [
            'attribute' => 'degree',
            'value' => function(Teacher $model) {
                return $model->getDegreeLabel();
            },
            'filter' => Teacher::getDegrees()
        ],
        //'degree_extra',
        [
            'attribute' => 'is_head',
            'value' => function(Teacher $model) {
                return $model->is_head ? "Да" : "Нет";
            },
            'filter' => [
                0 => "Нет",
                1 => "Да"
            ]
        ],
        [
            'attribute' => 'is_pps',
            'value' => function(Teacher $model) {
                return $model->is_pps ? "Да" : "Нет";
            },
            'filter' => [
                0 => "Нет",
                1 => "Да"
            ]
        ],
        'state',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{qrcode} {view} {update} {delete}',
            'buttons' => [
                'qrcode' => function ($url, $model, $key) {
                    return Html::button('<span class="fa fa-image"></span>', [
                        'class' => 'employee-qrcode-btn btn btn-info',
                        'data-id' => $model->id
                    ]);
                }
            ]
        ],
    ] ?>
=======
            'surname',
            'name',
            'patronymic',
            [
                'attribute' => 'degree',
                'value' => function(Teacher $model) {
                    return $model->getDegreeLabel();
                },
                'filter' => Teacher::getDegrees()
            ],
            //'degree_extra',
            [
                'attribute' => 'is_head',
                'value' => function(Teacher $model) {
                    return $model->is_head ? "Да" : "Нет";
                },
                'filter' => [
                    0 => "Нет",
                    1 => "Да"
                ]
            ],
            [
                'attribute' => 'is_pps',
                'value' => function(Teacher $model) {
                    return $model->is_pps ? "Да" : "Нет";
                },
                'filter' => [
                    0 => "Нет",
                    1 => "Да"
                ]
            ],
            'state',

            ['class' => 'yii\grid\ActionColumn'],
        ] ?>
>>>>>>> f933d03ac400c442045ca7b6c9a487ac18e9f27c

        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns
        ]) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns,
        ]) ?>
    </div>

</div>
<?php
Modal::begin([
    'header' => '<h4>QrCode</h4>',
    'id' => 'modal-qrcode',
    'size' => 'modal-sm'
]);

echo '<div id="modal-qrcode__content"></div>';

Modal::end();

$js =<<<JS
$('.employee-qrcode-btn').on('click', function() {
    $('#modal-qrcode').modal('show')
    .find('#modal-qrcode__content')
    .load('/teacher/get-qrcode', {id: $( this ).data('id')});
});
JS;

$this->registerJs($js);
?>