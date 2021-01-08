<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subject */

$this->title = 'Обновить дисциплину: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
