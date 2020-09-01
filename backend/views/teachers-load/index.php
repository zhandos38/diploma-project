<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeachersLoadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пед. нагрузка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-load-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

    <?php LteBox::end() ?>

</div>
