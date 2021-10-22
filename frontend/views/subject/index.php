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

$this->title = 'Дисциплины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                [
                    'attribute' => 'component_id',
                    'value' => function(Subject $model) {
                        return !empty($model->componentItem) ? $model->componentItem->component->name : 'Не указано';
                    },
                    'filter' => ArrayHelper::map(Component::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name')
                ],
                [
                    'attribute' => 'component_item_id',
                    'value' => function(Subject $model) {
                        return !empty($model->componentItem) ? $model->componentItem->name : 'Не указано';
                    },
//                'filter' => ArrayHelper::map(ComponentItem::find()->asArray()->all(), 'id', 'name')
                ],
                [
                    'attribute' => 'module_id',
                    'value' => function(Subject $model) {
                        return !empty($model->moduleItem) ? $model->moduleItem->module->name : 'Не указано';
                    },
                    'filter' => ArrayHelper::map(Module::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name')
                ],
                [
                    'attribute' => 'module_item_id',
                    'value' => function(Subject $model) {
                        return !empty($model->moduleItem) ? $model->moduleItem->name : 'Не указано';
                    },
//                'filter' => ArrayHelper::map(ModuleItem::find()->asArray()->all(), 'id', 'name')
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
                            return Html::a('<span class="fa fa-edit"></span>', Url::to(['update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
                        },
                        'delete' => function($url, $model) {
                            return Html::a('<span class="fa fa-trash"></span>', Url::to(['delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
                        },
                    ]
                ],
            ],
        ]) ?>
    </div>

</div>
