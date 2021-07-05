<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SpecialtyGroup */

$this->title = 'Создать образовательную программу';
$this->params['breadcrumbs'][] = ['label' => 'Образовательные программы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialty-group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
