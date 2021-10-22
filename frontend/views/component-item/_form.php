<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ComponentItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="component-item-form card">

    <div class="card-header">
        <?= Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['component/update', 'id' => $model->component_id], ['class' => 'btn btn-danger btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
