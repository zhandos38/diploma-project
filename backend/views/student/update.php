<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = 'Обновить студента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Студент', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="student-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
