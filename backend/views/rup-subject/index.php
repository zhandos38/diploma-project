<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RupSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'РУП предметы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-subject-index">

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
            'rup_id',
            'subject_id',
            'semester',
            'amount_lecture',
            //'amount_practice',
            //'amount_lab',
            //'is_course_work',
            //'is_gos',
            //'is_exam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
