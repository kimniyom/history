<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GroupUser */

$this->title = 'Create Group User';
$this->params['breadcrumbs'][] = ['label' => 'Group Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
