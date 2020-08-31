<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rup */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Ведение РУП', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
