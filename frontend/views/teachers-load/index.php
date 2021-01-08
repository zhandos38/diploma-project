<?php

use common\models\Group;
use common\models\Subject;
use common\models\Teacher;
use common\models\TeachersLoad;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
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

    <?php $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'group_id',
            'value' => function(TeachersLoad $model) {
                return $model->group->name;
            },
            'filter' => ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'teacher_id',
            'value' => function(TeachersLoad $model) {
                return $model->teacher->name;
            },
            'filter' => ArrayHelper::map(Teacher::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'rup_subject_id',
            'value' => function(TeachersLoad $model) {
                return $model->rupSubject->subject->name;
            },
            'filter' => ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name')
        ],
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
    ] ?>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>

    <?php LteBox::end() ?>

</div>
