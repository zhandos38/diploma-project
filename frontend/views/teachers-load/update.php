<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeachersLoad */

$this->title = 'Обновить пед. нагрузку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teachers Loads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="teachers-load-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
