<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form card">

    <div class="card-header">
        <?= Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']) ?>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'specialty_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Specialty::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите специальность']) ?>

        <?= $form->field($model, 'degree')->dropDownList(\common\models\Helper::getDegrees(), ['prompt' => 'Выбрите степень']) ?>

        <?= $form->field($model, 'language')->dropDownList(\common\models\Helper::getLanguages(), ['prompt' => 'Выберите язык']) ?>

        <?= $form->field($model, 'mode')->dropDownList(\common\models\Helper::getModes(), ['prompt' => 'Выберите форму обучение']) ?>

        <?= $form->field($model, 'enter_year')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rup_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Rup::find()->asArray()->all(), 'id', function ($model) {
            return $model['year'] . ' - ' . $model['lang'];
        }), ['prompt' => 'Выберите РУП']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
