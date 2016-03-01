<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GroupPcu */

$this->title = 'Create Group Pcu';
$this->params['breadcrumbs'][] = ['label' => 'Group Pcus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-pcu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
