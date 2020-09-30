<?php

use common\models\Component;
use common\models\Helper;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Предметы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'component_id',
                'value' => function(Subject $model) {
                    return $model->component->name;
                },
                'filter' => ArrayHelper::map(Component::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'subject_type_id',
                'value' => function(Subject $model) {
                    return $model->subjectType->name;
                },
                'filter' => ArrayHelper::map(\common\models\SubjectType::find()->asArray()->all(), 'id', 'name')
            ],
            'code',
            [
                'attribute' => 'module_id',
                'value' => function(Subject $model) {
                    return $model->module->name;
                },
                'filter' => ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'language',
                'value' => function(Subject $model) {
                    return ArrayHelper::getValue(Helper::getLanguages(), $model->language);
                },
                'filter' => Helper::getLanguages()
            ],
            [
                'attribute' => 'is_practice',
                'value' => function(Subject $model) {
                    return $model->is_practice ? "Да" : "Нет";
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
