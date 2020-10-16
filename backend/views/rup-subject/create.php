    <?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RupSubject */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'РУП дисциплина', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rup-subject-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
