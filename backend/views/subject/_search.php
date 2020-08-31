<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'component_id') ?>

    <?= $form->field($model, 'subject_type_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'module_id') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'is_practice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
