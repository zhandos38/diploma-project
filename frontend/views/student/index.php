<?php

use common\models\Group;
use common\models\Student;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index card">

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
                'attribute' => 'group_id',
                'value' => function(Student $model) {
                    return $model->group->name;
                },
                'filter' => ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name')
            ],
            'phone',
            'phone_parent',
            'iin',
            [
                'attribute' => 'social_status',
                'value' => function(Student $model) {
                    return $model->getSocialStatus();
                },
                'filter' => Student::getSocialStatuses()
            ],
            [
                'attribute' => 'is_grant',
                'value' => function(Student $model) {
                    return $model->is_grant ? 'Да' : 'Нет';
                },
                'filter' => [
                    'Нет', 'Да'
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="fa fa-edit"></span>', Url::to(['update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', Url::to(['delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
                    },
                ]
            ],
        ]; ?>

        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns
        ]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns
        ]) ?>
    </div>

</div>
