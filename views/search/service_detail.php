<style type="text/css">
    #form-service .form-control{ color: #33ff00;}
</style>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\models\Config_system;

$config = new Config_system();
?>

<div class="row" id="form-service">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">วันที่มารับบริการ</div>
                <?php
                if (!empty($model['DATE_SERV'])) {
                    $dateServie = $config->ThaiDateNoFormat($model['DATE_SERV']);
                } else {
                    $dateServie = "";
                }
                ?>
                <input type="text" class="form-control" id="DATE_SERV"  value="<?php echo $dateServie ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">เลขคิว</div>
                <input type="text" class="form-control" id="SEQ"  value="<?php echo $model['SEQ'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">HN</div>
                <input type="text" class="form-control" id="HN"  value="<?php echo $model['HN'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">PID</div>
                <input type="text" class="form-control" id="PID"  value="<?php echo $model['PID'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-9 col-lg-9">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">สถานบริการ</div>
                <input type="text" class="form-control" id="HOSPNAME"  value="<?php echo $model['HOSPNAME'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">อาการสำคัญ</div>
                <textarea class="form-control" rows="3" readonly="readonly" id="textarea"><?php echo $model['CHIEFCOMP'] ?></textarea>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $model['SBP'] . "/" . $model['DBP'] ?></h3>
                <p>ความดันโลหิต(SBP)</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $model['PR'] ?></h3>
                <p>การเต้นของชีพจร(PR)</p>
            </div>
            <div class="icon">
                <i class="fa fa-heartbeat"></i>
            </div>

        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $model['RR'] ?></h3>
                <p>อัตราการหายใจ(RR)</p>
            </div>
            <div class="icon">
                <i class="fa fa-heart"></i>
            </div>

        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?php echo $model['BTEMP'] ?></h3>
                <p>อุณหภูมิร่างกาย(BTEMP)</p>
            </div>
            <div class="icon">
                <i class="fa fa-child"></i>
            </div>

        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">สิทธิการรักษาที่ใช้</div>
                <input type="text" class="form-control" id="INSID" value="<?php echo $model['INSID'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">ค่าบริการทั้งหมด</div>
                <input type="text" class="form-control" id="PRICE" value="<?php echo $model['PRICE'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">ต้องจ่ายเอง</div>
                <input type="text" class="form-control" id="PAYPRICE" value="<?php echo $model['PAYPRICE'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">จ่ายจริง</div>
                <input type="text" class="form-control" id="ACTUALPAY" value="<?php echo $model['ACTUALPAY'] ?>" readonly="readonly">
            </div>
        </div>
    </div>

</div>