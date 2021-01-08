<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Group */

$this->title = 'Обновить группу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Группа';
?>
<div class="group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
