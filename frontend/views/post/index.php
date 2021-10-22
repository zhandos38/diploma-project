<?php

use common\models\Post;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'img',
                [
                    'attribute' => 'created_at',
                    'value' => function(Post $model) {
                        return date('d-m-Y H:i', $model->created_at);
                    },
                    'filter' => DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'createTimeRange',
                        'convertFormat' => true,
                        'pjaxContainerId' => 'crud-datatable-pjax',
                        'pluginOptions' => [
                            'locale' => [
                                'format'=>'Y-m-d'
                            ],
                            'convertFormat'=>true
                        ]
                    ]),
                ],


                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]) ?>
    </div>

</div>
