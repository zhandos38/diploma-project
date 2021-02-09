<?php

use common\models\Component;
use common\models\ComponentItem;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Component */

$this->title = 'Цикл: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Циклы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="component-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['component-item/create', 'component' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Подкомпоненты'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span>', Url::to(['component-item/update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', Url::to(['component-item/delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
                    },
                ]
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
