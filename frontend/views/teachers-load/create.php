<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeachersLoad */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Пед. нагрузка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-load-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
