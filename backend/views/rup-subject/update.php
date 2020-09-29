<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RupSubject */

$this->title = 'Обновить РУП предмет: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rup Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="rup-subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
