<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComponentItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Component Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="component-item-index card">

    <div class="card-header">
        <?= Html::a('Create Component Item', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'component_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]) ?>
    </div>

</div>
