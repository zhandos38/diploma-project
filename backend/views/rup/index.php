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
            ['class' => 'yii\grid\SerialColumn'],

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
                    return $model->language;
                },
                'filter' => \common\models\Helper::getLanguages()
            ],
            'year',
            [
                'attribute' => 'direction_id',
                'value' => function(Rup $model) {
                    return $model->direction->name;
                },
                'filter' => ArrayHelper::map(EducationDirection::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'education_id',
                'value' => function(Rup $model) {
                    return $model->education->name;
                },
                'filter' => ArrayHelper::map(Education::find()->asArray()->all(), 'id', 'name')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ];
    ?>

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
