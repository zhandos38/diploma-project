<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Component */

$this->title = 'Обновить компонент: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="component-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
