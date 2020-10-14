<?php

use common\models\Component;
use common\models\ComponentItem;
use common\models\Helper;
use common\models\Module;
use common\models\ModuleItem;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
                    return $model->componentItem->component->name;
                },
                'filter' => ArrayHelper::map(Component::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'component_item_id',
                'value' => function(Subject $model) {
                    return $model->componentItem->name;
                },
//                'filter' => ArrayHelper::map(ComponentItem::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'module_id',
                'value' => function(Subject $model) {
                    return $model->moduleItem->module->name;
                },
                'filter' => ArrayHelper::map(Module::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'module_item_id',
                'value' => function(Subject $model) {
                    return $model->moduleItem->name;
                },
//                'filter' => ArrayHelper::map(ModuleItem::find()->asArray()->all(), 'id', 'name')
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span>', Url::to(['update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', Url::to(['delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
                    },
                ]
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
