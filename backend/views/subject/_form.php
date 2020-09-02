<?php

use common\models\Component;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'component_id')->dropDownList(\yii\helpers\ArrayHelper::map(Component::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите компонент']) ?>

    <?= $form->field($model, 'subject_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\SubjectType::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите тип']) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'module_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Module::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите модуль']) ?>

    <?= $form->field($model, 'language')->dropDownList(\common\models\Language::getAll(), ['prompt' => 'Выберите язык']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_practice')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
