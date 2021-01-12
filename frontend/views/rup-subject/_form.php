<?php

use common\models\Component;
use common\models\ComponentItem;
use common\models\Helper;
use common\models\Module;
use common\models\ModuleItem;
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

    <?= $form->field($model, 'component_id')->dropDownList(ArrayHelper::map(Component::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name'), ['id' => 'component-id', 'prompt' => 'Выберите компонент', 'value' => $model->subject ? $model->subject->componentItem->component_id : null]) ?>

    <?= $form->field($model, 'component_item_id')->dropDownList(ArrayHelper::map(ComponentItem::find()->asArray()->all(), 'id', 'name'), ['id' => 'component-item-id', 'prompt' => 'Выберите подкомпонент', 'value' => $model->subject ? $model->subject->component_item_id : null]) ?>

    <?= $form->field($model, 'module_id')->dropDownList(ArrayHelper::map(Module::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name'), ['id' => 'module-id', 'prompt' => 'Выберите модуль', 'value' => $model->subject ? $model->subject->moduleItem->module_id : null]) ?>

    <?= $form->field($model, 'module_item_id')->dropDownList(ArrayHelper::map(ModuleItem::find()->asArray()->all(), 'id', 'name'), ['id' => 'module-item-id', 'prompt' => 'Выберите подмодуль', 'value' => $model->subject ? $model->subject->module_item_id : null]) ?>

    <?= $form->field($model, 'lang')->dropDownList(RupSubject::getLanguages(), ['prompt' => 'Выберите язык']) ?>

    <?= $form->field($model, 'semester')->dropDownList(Helper::getSemesters(), ['prompt' => 'Выберите семестр']) ?>

    <?php if (!$model->isNewRecord): ?>
    <?= $form->field($model, 'code')->textInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'amount_lecture')->textInput() ?>

    <?= $form->field($model, 'amount_lab')->textInput() ?>

    <?= $form->field($model, 'amount_practice')->textInput() ?>

    <?= $form->field($model, 'amount_extra')->textInput() ?>

    <?= $form->field($model, 'amount_srop')->textInput() ?>

    <?= $form->field($model, 'is_course_work')->checkbox() ?>

    <?= $form->field($model, 'is_gos')->checkbox() ?>

    <?= $form->field($model, 'is_exam')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
<?php
$js =<<<JS
$('#component-id').change(function() {
  $.get({
    url: '/component/get-component-items',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>Выбрите подкомпонент</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#component-item-id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#module-id').change(function() {
  $.get({
    url: '/module/get-module-items',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>Выберите подмодуль</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#module-item-id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;

$this->registerJs($js);

?>
