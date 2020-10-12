<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ModuleItem */

$this->title = 'Создать подмодуль';
$this->params['breadcrumbs'][] = ['label' => 'Module Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
