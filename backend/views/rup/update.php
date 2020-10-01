<?php

use common\models\Helper;
use common\models\RupSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
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

    <?php

    $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'module_id',
            'label' => 'Модуль',
            'value' => function(RupSubject $model) {
                return $model->subject->module->name;
            },
            'filter' => \yii\helpers\ArrayHelper::map(\common\models\Module::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'component_id',
            'label' => 'Компонент',
            'value' => function(RupSubject $model) {
                return $model->subject->component->name;
            },
            'filter' => \yii\helpers\ArrayHelper::map(\common\models\Component::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'subject_id',
            'value' => function(RupSubject $model) {
                return $model->subject->name;
            },
            'filter' => \yii\helpers\ArrayHelper::map(\common\models\Subject::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'code',
            'label' => 'Код предмета',
            'value' => function(RupSubject $model) {
                return $model->subject->code;
            }
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
    ];

    ?>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'filename' => $model->specialty->name . '-' . $model->language . '-' . ArrayHelper::getValue(Helper::getDegrees(), $model->degree) . '-' . ArrayHelper::getValue(Helper::getModes(), $model->mode) . '-' . $model->year,
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>

    <?php LteBox::end() ?>

</div>
