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
use kartik\select2\Select2;
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

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                'id' => 'subject-id',
                'data' => ArrayHelper::map(Subject::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Укажите дисциплину'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'component_id')->dropDownList(ArrayHelper::map(Component::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name'), ['id' => 'component-id', 'prompt' => 'Выберите компонент', 'value' => $model->subject ? $model->subject->componentItem->component_id : null]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'component_item_id')->dropDownList(ArrayHelper::map(ComponentItem::find()->asArray()->all(), 'id', 'name'), ['id' => 'component-item-id', 'prompt' => 'Выберите подкомпонент', 'value' => $model->subject ? $model->subject->component_item_id : null]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'module_id')->dropDownList(ArrayHelper::map(Module::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'name'), ['id' => 'module-id', 'prompt' => 'Выберите модуль', 'value' => $model->subject ? $model->subject->moduleItem->module_id : null]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'module_item_id')->dropDownList(ArrayHelper::map(ModuleItem::find()->asArray()->all(), 'id', 'name'), ['id' => 'module-item-id', 'prompt' => 'Выберите подмодуль', 'value' => $model->subject ? $model->subject->module_item_id : null]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'lang')->dropDownList(RupSubject::getLanguages(), ['prompt' => 'Выберите язык']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'semester')->dropDownList(Helper::getSemesters(), ['prompt' => 'Выберите семестр']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount_lecture')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount_lab')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount_practice')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount_extra')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount_srop')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'is_course_work')->checkbox() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'is_gos')->checkbox() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'is_exam')->checkbox() ?>
        </div>
        <div class="col-md-4">
            <?php if (!$model->isNewRecord): ?>
                <?= $form->field($model, 'code')->textInput() ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
<?php
$js =<<<JS
$('#rupsubject-subject_id').change(function() {
  $.get({
    url: '/subject/get-subject',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      $('#component-item-id').val(result['module_id']);
      $('#module-item-id').val(result['component_id']);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

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
