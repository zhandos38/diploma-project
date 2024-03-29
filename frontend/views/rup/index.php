<?php

use common\models\Helper;
use common\models\Rup;
use common\models\User;
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

$this->title = 'Учебный план';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
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
                'attribute' => 'lang',
                'value' => function(Rup $model) {
                    return $model->getLanguage();
                },
                'filter' => Rup::getLanguages()
            ],
            'year',
        ];
        //    \PhpOffice\PhpSpreadsheet\Spreadsheet::
        ?>

        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
        ]); ?>

        <?php
        array_unshift($columns , ['class' => 'yii\grid\SerialColumn']);
        array_push($columns, [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function($url, $model) {
                    return Html::a('<span class="fa fa-edit"></span>', Url::to(['rup/update', 'id' => $model->id]), ['title' => 'обновить', 'class' => 'btn btn-info']);
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
        ]) ?>
    </div>

</div>
