<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Specialty */

$this->title = 'Создать специальность';
$this->params['breadcrumbs'][] = ['label' => 'Специальность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialty-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
