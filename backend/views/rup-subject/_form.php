<?php

use common\models\Helper;
use common\models\RupSubject;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
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
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['rup/update', 'id' => $model->rup_id], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name'), ['prompt' => 'Укажите дисциплину']) ?>

    <?= $form->field($model, 'language')->dropDownList(RupSubject::getLanguages(), ['prompt' => 'Выберите язык']) ?>

    <?= $form->field($model, 'semester')->dropDownList(Helper::getSemesters(), ['prompt' => 'Выберите семестр']) ?>

    <?= $form->field($model, 'amount_lecture')->textInput() ?>

    <?= $form->field($model, 'amount_practice')->textInput() ?>

    <?= $form->field($model, 'amount_lab')->textInput() ?>

    <?= $form->field($model, 'is_course_work')->checkbox() ?>

    <?= $form->field($model, 'is_gos')->checkbox() ?>

    <?= $form->field($model, 'is_exam')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
