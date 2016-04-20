<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masuser */

$this->title = 'เพิ่มผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuser-create">

    <h4><i class="fa fa-user-plus text-success"></i> <?= Html::encode($this->title) ?></h4>
    <hr id="hr"/>
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
