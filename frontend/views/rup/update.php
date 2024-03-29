<?php

use common\models\Component;
use common\models\Helper;
use common\models\Module;
use common\models\ModuleItem;
use common\models\RupSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Rup */

$this->title = 'Обновить РУП: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Список РУП-ов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="rup-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="rup-subject-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['rup-subject/create', 'rup' => $model->id], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?php
        $columns = [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'module_id',
                'label' => 'Модуль',
                'value' => function(RupSubject $model) {
                    return $model->moduleItem->module->name;
                },
                'filter' => ArrayHelper::map(Module::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'module_item_id',
                'label' => 'Подмодуль',
                'value' => function(RupSubject $model) {
                    return $model->moduleItem->name;
                },
                'filter' => false
            ],
            [
                'attribute' => 'component_id',
                'label' => 'Цикл',
                'value' => function(RupSubject $model) {
                    return $model->componentItem->component->name;
                },
                'filter' => ArrayHelper::map(Component::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'component_item_id',
                'label' => 'Подцикл',
                'value' => function(RupSubject $model) {
                    return $model->componentItem->name;
                },
                'filter' => false
            ],
            [
                'attribute' => 'code',
                'label' => 'Код дисциплины',
                'format' => 'raw'
            ],
            [
                'attribute' => 'subject_id',
                'value' => function(RupSubject $model) {
                    return $model->subject->name;
                },
                'filter' => ArrayHelper::map(\common\models\Subject::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'lang',
                'value' => function(RupSubject $model) {
                    return $model->getLanguage();
                },
                'filter' => RupSubject::getLanguages(),
                'contentOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'semester',
                'filter' => Helper::getSemesters(),
                'contentOptions' => ['class' => 'text-center']
            ],
            [
                'value' => function(RupSubject $model) {
                    return round(($model->amount_lecture + $model->amount_practice + $model->amount_lab + $model->amount_extra + $model->amount_srop)/30);
                },
                'label' => 'Кредиты (KZ)',
                'contentOptions' => ['class' => 'text-center'],
                'pageSummary' => true
            ],
            [
                'value' => function(RupSubject $model) {
                    return $model->amount_lecture + $model->amount_practice + $model->amount_lab + $model->amount_extra + $model->amount_srop;
                },
                'label' => 'Всего часов',
                'contentOptions' => ['style' => 'max-width: 20px;', 'class' => 'text-center'],
                'pageSummary' => true,
                'headerOptions' => ['style' => 'width:20px'],
            ],
            [
                'attribute' => 'amount_lecture',
                'format' => 'raw',
                'contentOptions' => ['style' => 'max-width: 20px;', 'class' => 'text-center'],
                'pageSummary' => true
            ],
            [
                'attribute' => 'amount_lab',
                'contentOptions' => ['style' => 'max-width: 20px;', 'class' => 'text-center'],
                'pageSummary' => true
            ],
            [
                'attribute' => 'amount_practice',
                'contentOptions' => ['style' => 'max-width: 20px;', 'class' => 'text-center'],
                'pageSummary' => true
            ],
            [
                'attribute' => 'amount_extra',
                'contentOptions' => ['style' => 'max-width: 20px;', 'class' => 'text-center'],
                'pageSummary' => true
            ],
            [
                'attribute' => 'amount_srop',
                'contentOptions' => ['style' => 'max-width: 20px;', 'class' => 'text-center'],
                'pageSummary' => true
            ],
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
            [
                'attribute' => 'is_exam_diff',
                'value' => function(RupSubject $model) {
                    return $model->is_exam_diff ? "Да" : "Нет";
                },
                'filter' => [
                    0 => "Нет",
                    1 => "Да"
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="fa fa-edit"></span>', Url::to(['rup-subject/update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', Url::to(['rup-subject/delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
                    },
                ]
            ],
        ];
        ?>

        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
            'filename' => 'РУП',
            'contentBefore' => [
                ['value' => 'МИНИСТЕРСТВО ОБРАЗОВАНИЯ И НАУКИ РЕСПУБЛИКИ КАЗАХСТАН', 'styleOptions' => [ExportMenu::FORMAT_EXCEL_X => ['font' => ['bold' => true, 'size' => '12px', 'align-items' => 'center']]]],
                ['value' => 'УЧЕБНЫЙ ПЛАН'],
                ['value' => 'Код и классификация области образования: ' . (!empty($model->specialty->specialtyGroup->trainingDirection) ? $model->specialty->specialtyGroup->trainingDirection->name : 'Не указано')],
                ['value' => 'Код и классификация направлений подготовки: ' . (!empty($model->specialty->specialtyGroup) ? $model->specialty->specialtyGroup->name : 'Не указано')],
                ['value' => 'Код и наименование образовательной программы: ' . $model->specialty->name],
                ['value' => 'Форма обучения: ' . Helper::getMode($model->mode)],
                ['value' => 'Уровень подготовки: ' . $model->getDegree()],
            ]
        ]) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns,
            'showPageSummary' => true,
            'showFooter' => true
        ]) ?>
    </div>

</div>
