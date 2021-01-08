<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rup-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'specialty_id') ?>

    <?= $form->field($model, 'language') ?>

    <?= $form->field($model, 'degree') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'mode') ?>

    <?php // echo $form->field($model, 'direction') ?>

    <?php // echo $form->field($model, 'education') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
