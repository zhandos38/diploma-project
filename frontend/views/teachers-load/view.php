<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeachersLoad */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teachers Loads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="teachers-load-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'group_id',
            'teacher_id',
            'rup_subject_id',
            'practice',
            'course_work',
            'exam',
            'block',
            'year',
            'tutor_connection',
            'diploma_leader',
            'amount_lecture',
            'amount_practice',
            'amount_lab',
        ],
    ]) ?>

</div>
