<?php

use common\models\Helper;
use common\models\Rup;
use common\models\Specialty;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
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

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'specialty_id')->dropDownList(ArrayHelper::map(Specialty::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выбрите степень']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'degree')->dropDownList(Helper::getDegrees(), ['prompt' => 'Выбрите степень']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'lang')->dropDownList(Rup::getLanguages(), ['prompt' => 'Выберите язык']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'mode')->dropDownList(Helper::getModes(), ['prompt' => 'Выберите форму обучение']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'year')->dropDownList([
                2020 => '2020',
                2021 => '2021',
                2022 => '2022',
                2023 => '2023',
                2024 => '2024',
                2025 => '2025',
                2026 => '2026',
                2027 => '2027',
                2028 => '2028',
                2029 => '2029',
                2030 => '2030'
            ], [
                'prompt' => 'Выберите год'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
