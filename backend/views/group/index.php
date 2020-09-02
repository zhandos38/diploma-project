<?php

use common\models\Group;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Группы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?php $columns = [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        'language',
        [
            'attribute' => 'degree',
            'value' => function(Group $model) {
                return $model->getDegreeLabel();
            }
        ],
        'mode',
        'enter_year',
        [
            'attribute' => 'specialty_id',
            'value' => function(Group $model) {
                return $model->specialty->name;
            }
        ],
        [
            'attribute' => 'rup_id',
            'value' => function(Group $model) {
                return $model->rup->specialty->name . ' - ' . $model->rup->year . ' - ' . $model->rup->language;
            }
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ]; ?>

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
