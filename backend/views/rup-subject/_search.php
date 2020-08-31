<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RupSubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rup-subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rup_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'semester') ?>

    <?= $form->field($model, 'amount_lecture') ?>

    <?php // echo $form->field($model, 'amount_practice') ?>

    <?php // echo $form->field($model, 'amount_lab') ?>

    <?php // echo $form->field($model, 'is_course_work') ?>

    <?php // echo $form->field($model, 'is_gos') ?>

    <?php // echo $form->field($model, 'is_exam') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
