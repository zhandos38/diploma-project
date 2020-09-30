<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SubjectType */

$this->title = 'Создать предмет';
$this->params['breadcrumbs'][] = ['label' => 'Виды предметов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
