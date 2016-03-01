<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupPcu */

$this->title = 'Update Group Pcu: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Group Pcus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="group-pcu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
