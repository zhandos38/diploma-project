<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeachersLoadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-load-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'rup_subject_id') ?>

    <?= $form->field($model, 'practice') ?>

    <?php // echo $form->field($model, 'course_work') ?>

    <?php // echo $form->field($model, 'exam') ?>

    <?php // echo $form->field($model, 'block') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'tutor_connection') ?>

    <?php // echo $form->field($model, 'diploma_leader') ?>

    <?php // echo $form->field($model, 'amount_lecture') ?>

    <?php // echo $form->field($model, 'amount_practice') ?>

    <?php // echo $form->field($model, 'amount_lab') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
