<?php

use common\models\Group;
use common\models\Student;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?php $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        'surname',
        'name',
        'patronymic',
        [
            'attribute' => 'group_id',
            'value' => function(Student $model) {
                return $model->group->name;
            },
            'filter' => ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name')
        ],
        'phone',
        'phone_parent',
        'iin',

        ['class' => 'yii\grid\ActionColumn'],
    ]; ?>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns
    ]); ?>

    <?php LteBox::end() ?>

</div>
