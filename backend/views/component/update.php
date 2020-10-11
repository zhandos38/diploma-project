<?php

use common\models\Component;
use common\models\ComponentItem;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Component */

$this->title = 'Обновить компонент: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="component-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'component_id',
                'value' => function(ComponentItem $model) {
                    return $model->component->name;
                },
                'filter' => ArrayHelper::map(ComponentItem::find()->asArray()->all(), 'id', 'name')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
