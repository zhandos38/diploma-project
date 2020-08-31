<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RupSubject */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'РУП предмет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
