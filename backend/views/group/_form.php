<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->dropDownList(\common\models\Language::getAll(), ['prompt' => 'Выберите язык']) ?>

    <?= $form->field($model, 'degree')->dropDownList(\common\models\Degree::getAll(), ['prompt' => 'Выбрите степень']) ?>

    <?= $form->field($model, 'mode')->textInput() ?>

    <?= $form->field($model, 'enter_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialty_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Specialty::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите специальность']) ?>

    <?= $form->field($model, 'rup_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Rup::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите РУП']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
