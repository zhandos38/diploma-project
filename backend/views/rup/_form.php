<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Rup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rup-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'specialty_id')->textInput() ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'degree')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'mode')->textInput() ?>

    <?= $form->field($model, 'direction')->textInput() ?>

    <?= $form->field($model, 'education')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
