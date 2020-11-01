<?php

use common\models\Component;
use common\models\Helper;
use common\models\Module;
use common\models\RupSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

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
            'attribute' => 'code',
            'value' => function(RupSubject $model) {
                $count = 0;
                $components = Component::find()->andWhere(['user_id' => Yii::$app->user->getId()])->all();
                foreach ($components as $component) {
                    $count++;
                    if ($component->id === $model->subject->component_id) {
                        break;
                    }
                }

                return  mb_substr($model->subject->name,0,1) . ' ' . $model->getSemester() . $count++;
            },
            'label' => 'Код дисциплины',
            'format' => 'raw'
        ],
        [
            'attribute' => 'module_id',
            'label' => 'Модуль',
            'value' => function(RupSubject $model) {
                return $model->subject->moduleItem->module->name;
            },
            'filter' => ArrayHelper::map(Module::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'component_id',
            'label' => 'Компонент',
            'value' => function(RupSubject $model) {
                return $model->subject->componentItem->component->name;
            },
            'filter' => ArrayHelper::map(Component::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'subject_id',
            'value' => function(RupSubject $model) {
                return $model->subject->name;
            },
            'filter' => ArrayHelper::map(\common\models\Subject::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'semester',
            'filter' => \common\models\Helper::getSemesters()
        ],
        [
            'value' => function(RupSubject $model) {
                return ($model->amount_lecture + $model->amount_practice + $model->amount_lab)/30;
            },
            'label' => 'Кредиты (KZ)'
        ],
        'amount_lecture',
        'amount_practice',
        'amount_lab',
        'amount_extra',
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
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function($url, $model) {
                    return Html::a('<span class="fa fa-pencil"></span>', Url::to(['rup-subject/update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
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
        'filename' => $model->specialty->name . '-' . $model->language . '-' . ArrayHelper::getValue(Helper::getDegrees(), $model->degree) . '-' . ArrayHelper::getValue(Helper::getModes(), $model->mode) . '-' . $model->year,
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive'
        ],
        'columns' => $columns,
    ]); ?>

    <?php LteBox::end() ?>

</div>
