<?php

use common\models\User;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index card">

    <div class="card-header">
        <?= Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'username',
                'email:email',
                'role',
                [
                    'attribute' => 'status',
                    'value' => function(User $model) {
                        return $model->getStatusLabel();
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function(User $model) {
                        return date('m.d.Y H:i', $model->created_at);
                    }
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]) ?>
    </div>

</div>