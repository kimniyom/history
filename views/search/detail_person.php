<?php

use yii\helpers\Url;
?>

<center>
    <?php if($model['SEX'] == 'หญิง'){ ?>
    <img class="profile-user-img img-responsive img-circle" src="<?php echo Url::to('@web/web/themes/AdminLTE/dist/img/avatar2.png') ?>" alt="User profile picture">
    <?php } else {?>
    <img class="profile-user-img img-responsive img-circle" src="<?php echo Url::to('@web/web/themes/AdminLTE/dist/img/avatar.png') ?>" alt="User profile picture">
    <?php } ?>
</center>
<h4 class="profile-username text-center" style=" color: #009900;"><?php echo $model['PERSONNAME'] ?></h4>

<p class="text-muted text-center">อายุ <?php echo $model['AGE'] ?> ปี</p>
<div class="box box-info collapsed-box box-solid" style=" margin: 0px;">
    <div class="box-header with-border">
        <h3 class="box-title">ข้อมูลพื้นฐาน</h3>
        <div class="box-tools pull-right">
            <a href="javascript:get_service('<?php echo $model['CID'] ?>')" class="btn" role="button" title="โหลดข้อมูลซ้ำ">
                <i class="fa fa-refresh"></i>
            </a>
            <a class="btn" role="button" data-toggle="collapse" href="#box-detail" aria-expanded="false" aria-controls="box-detail" title="ดูข้อมูล">
                <i class="fa fa-eye"></i>
            </a>
        </div>
        <!-- /.box-tools -->
    </div>
    <div class="box-body" style="padding: 1px;"></div>
</div>

<!-- 
DETAIL 
-->

<div class="collapse" id="box-detail" style=" margin-top: 0px;">
    <ul class="list-group list-group-unbordered" style="border-radius: 0px; border: none;">
        <li class="list-group-item">
            <b>บัตรประชาชน</b> <a class="pull-right"><?php echo $model['CID'] ?></a>
        </li>
        <li class="list-group-item">
            <b>เพศ</b> <a class="pull-right"><?php echo $model['SEX'] ?></a>
        </li>
        <li class="list-group-item">
            <b>สถานะสมรส</b> <a class="pull-right"><?php echo $model['MSTATUS'] ?></a>
        </li>
        <li class="list-group-item">
            <b>วันเกิด</b> <a class="pull-right"><?php echo $model['BIRTH'] ?></a>
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
            <b>เลขที่สิทธิ์</b> <a class="pull-right"><?php echo $model['CID'] ?></a>
        </li>
        <li class="list-group-item">
            <b>อาชีพ</b> <a class="pull-right"><?php echo $model['OCCUPA'] ?></a>
        </li>
        <li class="list-group-item">
            <b>สถานะบุคคล</b> <a class="pull-right"><?php echo $model['TYPEAREA'] ?></a>
        </li>
    </ul>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-home"></i> ที่อยู่</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p class="text-muted">
                <?php echo $model['CID'] ?>
            </p>
        </div>
    </div>
</div>

