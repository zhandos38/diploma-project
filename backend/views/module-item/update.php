<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ModuleItem */

$this->title = 'Обновить подмодуль: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Module Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
