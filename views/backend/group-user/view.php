<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GroupUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Group Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-user-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">ข้อมูลกลุ่ม [<?php echo $model->group_name ?>]</div>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'group_name',
                'detail',
            ],
        ])
        ?>
    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        รายชื่อสถานบริการในลุ่มนี้ [<?php echo $model->group_name; ?>]
        <button type="button" class="btn btn-success btn-xs pull-right" style=" margin-top: 0px;" onclick="get_pcu_all('<?php echo $model->id ?>')"><i class="fa fa-plus"></i> เพิ่มสถานบริการ</button>
    </div>

    <table class="table table-striped"  id="list_pcu">
        <thead>
            <tr>
                <th>#</th>
                <th>HOSPCODE</th>
                <th>HOSNAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($pcu as $rs):
                $i ++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs['off_id'] ?></td>
                    <td><?php echo $rs['off_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php
$this->registerJs('
        $(document).ready(function () {
            $("#list_pcu").DataTable({
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            "iDisplayLength": 15, // กำหนดค่า default ของจำนวน record 
            //"sScrollY": "100px",
            "bFilter": false, // แสดง search box
            });
        });
        ');
?>

<!--- 
    ######### Dialog Get PCU ###########
-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="pop_get_pcu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="group_name">เลือกสถานบริการ</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height:85%; margin-bottom:50px;">
                <div id="showpcu_in_group"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="javascript:window.location.reload();">บันทึกข้อมูล</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function get_pcu_all(groupId) {
        $("#pop_get_pcu").modal();
        $("#showpcu_in_group").html("<center>Loading ... </center>");
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-pcu/get_pcu_all']) ?>";
        var data = {id: groupId};

        $.post(url, data, function (success) {
            $("#showpcu_in_group").html(success);
        });

    }
</script>

