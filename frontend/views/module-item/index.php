<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModuleItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Module Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-item-index card">

    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'module_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]) ?>
    </div>

</div>
