<?php

use common\models\RupSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RupSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'РУП предметы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-subject-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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
        ]) ?>
    </div>

</div>
