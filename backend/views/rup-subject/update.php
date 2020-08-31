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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
