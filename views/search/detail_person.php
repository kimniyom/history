
<?php

use yii\helpers\Url;
use yii\helpers\Html;

//use yii2mod\google\maps\markers\GoogleMaps;

$occupation = new \app\models\MasOccupation();
$web_config = new app\models\Config_system();
$occupation_name = $occupation->find()->where(['occupa_id' => $model['OCCUPA']])->one()['occupa_name'];
?>

<button type="button" class="btn btn-warning btn-xs pull-right" onclick="dialog_query_person();">ที่มา</button>

<center style="display:none;">
    <?php if ($model['SEX'] == 'หญิง') { ?>
        <img class="profile-user-img img-responsive img-circle" src="<?php echo Url::to('@web/web/themes/AdminLTE/dist/img/avatar2.png') ?>" alt="User profile picture">
    <?php } else { ?>
        <img class="profile-user-img img-responsive img-circle" src="<?php echo Url::to('@web/web/themes/AdminLTE/dist/img/avatar.png') ?>" alt="User profile picture">
<?php } ?>
</center>
<h4 class="profile-username" style=" color: #009900;"><?php echo $model['PERSONNAME'] ?></h4>
<p class="text-muted">อายุ <?php echo $model['AGE'] ?> ปี</p>

<!--
DETAIL
-->

<ul class="list-group list-group-unbordered" style="border-radius: 0px; border: none;">
    <li class="list-group-item">
        <b>บัตรประชาชน</b> <a class="pull-right"><?php echo $model['CID'] ?></a>
        <?php echo $model['PID'] ?>
<?php echo $model['HOSPCODE'] ?>
    </li>
    <li class="list-group-item">
        <b>เพศ</b> <a class="pull-right"><?php echo $model['SEX'] ?></a>
    </li>
    <li class="list-group-item">
        <b>สถานะสมรส</b> <a class="pull-right"><?php echo $model['MSTATUS'] ?></a>
    </li>
    <li class="list-group-item">
        <b>วันเกิด</b> <a class="pull-right"><?php echo $web_config->ThaiDateNoFormat($model['BIRTH']) ?></a>
    </li>
    <li class="list-group-item">
        <b>อายุ</b> <a class="pull-right"><?php echo $model['AGE'] ?></a>
    </li>
    <li class="list-group-item">
        <b>หมู่เลือด</b> <a class="pull-right"><?php echo $model['BLOOD'] ?></a>
    </li>
    <li class="list-group-item">
        <b>เชื้อชาติ</b> <a class="pull-right"><?php echo $model['RACE'] ?></a>
    </li>
    <li class="list-group-item">
        <b>สัญชาติ</b> <a class="pull-right"><?php echo $model['NATION'] ?></a>
    </li>
    <li class="list-group-item">
        <b>สิทธิ์การรักษา</b> <a class="pull-right"><?php echo $model['DISCHARGE'] ?></a>
    </li>
    <li class="list-group-item">
        <b>อาชีพ</b> <a class="pull-right"><?php echo $occupation_name; ?></a>
    </li>
    <li class="list-group-item">
        <b>สถานะบุคคล</b> 
        <a class="pull-right" 
           title="<?php echo $web_config->Get_type_area($model['TYPEAREA']) ?>"
           data-toggle="tooltip" data-placement="top" >
            <i class="fa fa-eye text-red"></i> <?php echo $model['TYPEAREA'] ?>
        </a>
    </li>
</ul>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-home"></i> ที่อยู่</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <p class="text-muted">
            <?php echo $address['HOUSENO'] ?>
            <?php echo $address['ROAD'] ?>
            <?php echo $address['villagename'] ?>
            <?php echo $address['tambonname'] ?>
            <?php echo $address['ampurname'] ?>
        <?php echo $address['changwatname'] ?>
        </p>
        <?php echo $map;?>
        <div id="googleMapmain" style=" width: 100%; height: 700px; max-height: 700px;"></div>
    </div>
</div>


<!-- Dialog Query Person -->
<div class="modal fade" tabindex="-1" role="dialog" id="query_person">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">คำสั่งประมวลผล</h4>
            </div>
            <div class="modal-body">
                <pre>
                //$cid = เลขบัตรประจำตัว 13 หลัก
                SELECT CID,
                    p.HOSPCODE,
                    p.PID,
                    CONCAT(IFNULL(mp.NAME, ''),
                    IFNULL(p.NAME, ''),
                    ' ',
                    IFNULL(p.LNAME, '')) AS PERSONNAME,
                    IF(SEX = '1','ชาย','หญิง') AS SEX,
                    BIRTH,
                    mstatus_desc AS MSTATUS,
                    OCCUPATION_NEW AS OCCUPA,
                    RACE,
                    NATION,
                    DISCHARGE,
                    YEAR(FROM_DAYS(DATEDIFF(CURDATE(), birth))) AS AGE,
                    CASE p.ABOGROUP 
                        WHEN '1' THEN 'A'
                        WHEN '2' THEN 'B' 
                        WHEN '3' THEN 'AB'
                        WHEN '4' THEN 'O'
                    END AS BLOOD,
                p.TYPEAREA
                FROM person p
                LEFT JOIN mas_prename mp ON p.PRENAME = mp.PRENAMECODE 
                LEFT JOIN co_maritalstatus ms ON ms.mstatus_code = p.MSTATUS
                WHERE p.CID = '$cid' ORDER BY p.D_UPDATE DESC LIMIT 1
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function () {
        set_center();
        //เซ็ตค่าไปที่ไฟล์ index.php 
        $("#person_name").text("<?php echo $model['PERSONNAME'] ?> อายุ <?php echo $model['AGE'] ?> ปี");
    });

    function dialog_query_person() {
        $("#query_person").modal();
    }

</script>
