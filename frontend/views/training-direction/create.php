<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TrainingDirection */

$this->title = 'Направление подготовки';
$this->params['breadcrumbs'][] = ['label' => 'Training Directions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-direction-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
