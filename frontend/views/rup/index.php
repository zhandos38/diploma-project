<?php

use common\models\Education;
use common\models\EducationDirection;
use common\models\Helper;
use common\models\Rup;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'РУП';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?php
        $columns = [
            [
                'attribute' => 'specialty_id',
                'value' => function(Rup $model) {
                    return $model->specialty->name;
                },
                'filter' => ArrayHelper::map(\common\models\Specialty::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'degree',
                'value' => function(Rup $model) {
                    return ArrayHelper::getValue(Helper::getDegrees(), $model->degree);
                },
                'filter' => Helper::getDegrees()
            ],
            [
                'attribute' => 'mode',
                'value' => function(Rup $model) {
                    return ArrayHelper::getValue(Helper::getModes(), $model->mode);
                },
                'filter' => Helper::getModes()
            ],
            [
                'attribute' => 'language',
                'value' => function(Rup $model) {
                    return Helper::getLanguage($model->language);
                },
                'filter' => Helper::getLanguages()
            ],
            'year',
        ];
    ?>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns
    ]); ?>

    <?php
    array_unshift($columns , ['class' => 'yii\grid\SerialColumn']);
    array_push($columns, [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update} {delete}',
        'buttons' => [
            'update' => function($url, $model) {
                return Html::a('<span class="fa fa-pencil"></span>', Url::to(['rup/update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
            },
            'delete' => function($url, $model) {
                return Html::a('<span class="fa fa-trash"></span>', Url::to(['rup/delete', 'id' => $model->id]), ['title' => 'удалить', 'class' => 'btn btn-danger', 'data-confirm' => 'Вы действительно хотите удалить?', 'data-method' => 'post']);
            },
        ]
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>

    <?php LteBox::end() ?>

</div>
