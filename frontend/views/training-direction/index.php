<?php

use common\models\TrainingDirection;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TrainingDirectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Классификация области образования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-direction-index card">

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
                    'attribute' => 'degree',
                    'value' => function(TrainingDirection $model) {
                        return $model->getDegreeLabel();
                    },
                    'filter' => TrainingDirection::getDegreeLabels()
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
