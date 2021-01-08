<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComponentItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Component Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="component-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Component Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
    ]); ?>


</div>
