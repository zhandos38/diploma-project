<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeachersLoadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пед. нагрузка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-load-index">

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
            'group_id',
            'teacher_id',
            'rup_subject_id',
            'practice',
            //'course_work',
            //'exam',
            //'block',
            //'year',
            //'tutor_connection',
            //'diploma_leader',
            //'amount_lecture',
            //'amount_practice',
            //'amount_lab',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
