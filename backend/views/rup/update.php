<?php

use common\models\RupSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rup */

$this->title = 'Обновить РУП: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="rup-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="rup-subject-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['rup-subject/create', 'rup' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Предметы'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'subject_id',
                'value' => function(RupSubject $model) {
                    return $model->subject->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Subject::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'semester',
                'filter' => \common\models\Helper::getSemesters()
            ],
            'amount_lecture',
            'amount_practice',
            'amount_lab',
            [
                'attribute' => 'is_course_work',
                'value' => function(RupSubject $model) {
                    return $model->is_course_work ? "Да" : "Нет";
                },
                'filter' => [
                    0 => "Нет",
                    1 => "Да"
                ]
            ],
            [
                'attribute' => 'is_gos',
                'value' => function(RupSubject $model) {
                    return $model->is_gos ? "Да" : "Нет";
                },
                'filter' => [
                    0 => "Нет",
                    1 => "Да"
                ]
            ],
            [
                'attribute' => 'is_exam',
                'value' => function(RupSubject $model) {
                    return $model->is_exam ? "Да" : "Нет";
                },
                'filter' => [
                    0 => "Нет",
                    1 => "Да"
                ]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
