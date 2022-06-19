<?php

use common\models\Teacher;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
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
