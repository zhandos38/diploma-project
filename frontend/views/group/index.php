<?php

use common\models\Group;
use common\models\Helper;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
        [
            'attribute' => 'language',
            'value' => function(Group $model) {
                return ArrayHelper::getValue(Helper::getLanguages(), $model->language);
            },
            'filter' => Helper::getLanguages()
        ],
        [
            'attribute' => 'degree',
            'value' => function(Group $model) {
                return ArrayHelper::getValue(Helper::getDegrees(), $model->degree);
            },
            'filter' => Helper::getDegrees()
        ],
        [
            'attribute' => 'mode',
            'value' => function(Group $model) {
                return ArrayHelper::getValue(Helper::getModes(), $model->mode);
            },
            'filter' => Helper::getModes()
        ],
        'enter_year',
        [
            'attribute' => 'specialty_id',
            'value' => function(Group $model) {
                return $model->specialty ? $model->specialty->name : 'Не указано';
            },
            'filter' => ArrayHelper::map(\common\models\Specialty::find()->asArray()->all(), 'id', 'name')
        ],
        [
            'attribute' => 'rup_id',
            'value' => function(Group $model) {
                return $model->rup && $model->rup->specialty ? $model->rup->specialty->name . ' - ' . $model->rup->year . ' - ' . $model->rup->language : 'Не указано';
            },
            'filter' => ArrayHelper::map(\common\models\Rup::find()->asArray()->all(), 'id', function($model) {
                return $model['year'] . ' - ' . $model['lang'];
            })
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function($url, $model) {
                    return Html::a('<span class="fa fa-pencil"></span>', Url::to(['update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
                },
                'delete' => function($url, $model) {
                    return Html::a('<span class="fa fa-trash"></span>', Url::to(['delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
                },
            ]
        ],
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
