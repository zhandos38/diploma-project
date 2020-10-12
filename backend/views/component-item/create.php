<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ComponentItem */

$this->title = 'Создать подкомпонент';
$this->params['breadcrumbs'][] = ['label' => 'Component Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="component-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
