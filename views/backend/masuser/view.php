<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masuser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masuser-view well" style=" position: relative;">

    <h4><i class="fa fa-user"></i> ผู้ใช้งาน <?= Html::encode($this->title) ?></h4>
    <p style=" position: absolute; top: 20px; right: 15px;">
        <?= Html::a('<i class="fa fa-pencil fa-2x"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-sm']) ?>
        <?=
        Html::a('<i class="fa fa-trash fa-2x"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <hr id="hr"/>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'password',
            'name',
            'lname',
            'card',
            'hospcode',
            'flag',
            'create_date',
        ],
    ])
    ?>

</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-users"></i> สิทธิ์ดูผู้ป่วย
        <button type="button" class="btn btn-success btn-xs pull-right" style=" margin: 0px;" onclick="get_group()"><i class="fa fa-plus"></i> เพิ่มสิทธิ์</button>
    </div>
    <div id="privilege">

    </div>
</div>



<!--- 
    ######### Dialog Get Group ###########
-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="pop_group_user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="group_name">กลุ่มสถานบริการ</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height:85%; margin-bottom:50px;">
                <div id="show_group_user"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="javascript:window.location.reload();">บันทึกข้อมูล</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    
    function get_group() {
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-user/get_group']) ?>";
        var userId = "<?php echo $model->id ?>";
        var data = {userId: userId};
        $.post(url, data, function (datas) {
            $("#show_group_user").html(datas);
            $("#pop_group_user").modal();
        });
    }

    function GroupInPrivilege() {
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-user/privilege_user']) ?>";
        var userId = "<?php echo $model->id ?>";
        var data = {userId: userId};
        $.post(url, data, function (datas) {
            $("#privilege").html(datas);
        });
    }
</script>

<?php
$this->registerJs('
        $(document).ready(function () {
           GroupInPrivilege();
        });
        ');
?>







