<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masuser */

$this->title = 'แก้ไข: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="masuser-update well">

    <h4><?= Html::encode($this->title) ?></h4>
    <hr id="hr"/>
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
