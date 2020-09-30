<?php

use common\models\Teacher;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Teacher */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="teacher-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'surname',
            'name',
            'patronymic',
            'degree',
            'degree_extra',
            [
                'attribute' => 'is_head',
                'value' => function(Teacher $model) {
                    return $model->is_head ? "Да" : "Нет";
                },
            ],
            [
                'attribute' => 'is_pps',
                'value' => function(Teacher $model) {
                    return $model->is_pps ? "Да" : "Нет";
                },
            ],
            'state',
        ],
    ]) ?>

</div>
