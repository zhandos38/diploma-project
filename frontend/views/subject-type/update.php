<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SubjectType */

$this->title = 'Update Subject Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subject Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subject-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
