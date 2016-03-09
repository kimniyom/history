<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\CoOffice;
use app\models\MasPrename;

$office = new CoOffice();
$prename = new MasPrename();
/* @var $this yii\web\View */
/* @var $model app\models\Masuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masuser-form">

    <?php
    $form = ActiveForm::begin([
                'type' => ActiveForm::TYPE_VERTICAL,
                'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php
    // Normal select with ActiveForm & model
    $data = ArrayHelper::map($prename->get_prename(), 'OID', 'NAME');
    echo $form->field($model, 'prename')->widget(Select2::classname(), [
        'data' => $data,
        'language' => 'th',
        'options' => ['placeholder' => 'คำนำหน้าชื่อ ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?> 

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
    <?php
    // Normal select with ActiveForm & model
    $data = ArrayHelper::map($office->get_office(), 'off_id', 'off_name');
    echo $form->field($model, 'hospcode')->widget(Select2::classname(), [
        'data' => $data,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือกสถานบริการ ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?> 



    <div class="row">

        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-9 col-lg-9" style=" text-align: center;">
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> บันทึกข้อมูล' : '<i class="fa fa-edit"></i> แก้ไขข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
