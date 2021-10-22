<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeachersLoad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-load-form card">

    <div class="card-header">
        <?= Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'group_id')->textInput() ?>

        <?= $form->field($model, 'teacher_id')->textInput() ?>

        <?= $form->field($model, 'rup_subject_id')->textInput() ?>

        <?= $form->field($model, 'practice')->textInput() ?>

        <?= $form->field($model, 'course_work')->textInput() ?>

        <?= $form->field($model, 'exam')->textInput() ?>

        <?= $form->field($model, 'block')->textInput() ?>

        <?= $form->field($model, 'year')->textInput() ?>

        <?= $form->field($model, 'tutor_connection')->textInput() ?>

        <?= $form->field($model, 'diploma_leader')->textInput() ?>

        <?= $form->field($model, 'amount_lecture')->textInput() ?>

        <?= $form->field($model, 'amount_practice')->textInput() ?>

        <?= $form->field($model, 'amount_lab')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
