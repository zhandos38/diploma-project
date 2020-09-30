<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Module */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Модули', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
