<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RupSubject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rup-subject-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rup_id')->textInput() ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'amount_lecture')->textInput() ?>

    <?= $form->field($model, 'amount_practice')->textInput() ?>

    <?= $form->field($model, 'amount_lab')->textInput() ?>

    <?= $form->field($model, 'is_course_work')->textInput() ?>

    <?= $form->field($model, 'is_gos')->textInput() ?>

    <?= $form->field($model, 'is_exam')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
