<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Component */

$this->title = 'Создать компонент';
$this->params['breadcrumbs'][] = ['label' => 'Компоненты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="component-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
