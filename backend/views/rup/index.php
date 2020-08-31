<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'РУП';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'specialty_id',
            'language',
            'degree',
            'year',
            //'mode',
            //'direction',
            //'education',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
