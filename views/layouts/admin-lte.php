<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AdminLteAsset;
use app\assets\Geoxml3Asset;
use app\assets\JsAsset;
use yii\helpers\Url;

AdminLteAsset::register($this);
Geoxml3Asset::register($this);
JsAsset::register($this);
$this->title = "ประวัติผู้ป่วย";
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    </head>
    <body class="skin-blue-light fixed">
        <?php $this->beginBody() ?>

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo" id="bg-head-sidebar-line">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b><img src="<?php echo Url::to("@web/web/images/history-icon.png") ?>" width="32"/></b> ประวัติผู้ป่วย</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation" id="bg-nav-line">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <input type="text" id="PID"/>
                                <input type="text" id="HOSPCODE"/>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="javascript:popup_dialog()" class="dropdown-toggle">
                                    <img src="<?php echo Url::to('@web/web/images/recherche-icon.png'); ?>" class="user-image" alt="User Image" />
                                    ค้นหาผู้ป่วย
                                </a>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs"><?php echo Yii::$app->session['username'] ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE/dist/img/avatar.png') ?>" class="img-circle" alt="User Image">
                                        <p>
                                            ผู้ใช้งาน : <?php echo Yii::$app->session['username'] ?> 
                                            <small>สังกัด : <?php echo Yii::$app->session['hosname'] ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <!--
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                            -->
                                            <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat"><i class="fa fa-cog text-green"></i> ส่วนตัว</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="javascript:logout()" class="btn btn-default btn-flat"><i class="fa fa-power-off text-red"></i> ออกจากระบบ</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                        </ul>

                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar bg-black-gradient" id="bg-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" id="result_service">
                        <li><a href="javascript:popup_dialog()"><i class="fa fa-search text-red"></i> <span style="color: #ff6600;">ค้นหาผู้ป่วย</span></a></li>
                        <li class="header"><i class="fa fa-user"></i> ประวัติการรับบริการ</li>
                        <!-- 
                        แสดงข้อมูลการมารับบริการ
                        -->
                        <br/><br/><br/>
                        <center>
                            <i class="fa fa-ban"></i> ยังไม่ได้เลือกผู้ป่วย<br/> <br/><br/><br/>
                            <i class="fa fa-users fa-5x text-gray"></i>
                        </center>
                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin: 0px;padding: 0px; border-radius: 0px;">
                    <h4 style="margin: 0px; font-size: 14px;">
                        <?php
                        //echo Yii::$app->request->baseUrl;
                        ?>
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                    </h4>
                </section>

                <!-- Main content -->
                <section class="content" style=" margin-top: 0px; padding-top: 0px;">
                    <?= $content ?>
                </section><!-- /.content -->


            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer>
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>


<!-- 
    ############## Dialog Search ##############
-->
<div class="modal fade" id="dialog_search">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-user text-red"></i><i class="fa fa-search  text-green"></i> ค้นหาผู้ป่วย</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">CID</label>
                    <div class="input-group">
                        <div class="input-group-addon">CID</div>
                        <input type="text" class="form-control" id="cid" placeholder="เลขบัตรประชาชน">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">ชื่อ</label>
                    <div class="input-group">
                        <div class="input-group-addon">ชื่อ</div>
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">นามสกุล</label>
                    <div class="input-group">
                        <div class="input-group-addon">นามสกุล</div>
                        <input type="text" class="form-control" id="lname">
                    </div>
                </div>
                <div class="form-group" style=" text-align:  right;">
                    <button type="button" class="btn btn-primary" onclick="search_patient()"><i class="fa fa-search"></i> ค้นหา</button>
                    <button type="button" class="btn btn-danger" onclick="reload_search()"><i class="fa fa-remove"></i> ยกเลิก</button>
                </div>
                <!-- 
                แสดงผลการต้นหา 
                -->
                <div id="result_patient"></div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- 
    ############## Dialog Login ##############
-->
<div class="modal fade" id="dialog_login" data-backdrop="static">
    <div class="modal-dialog modal-info modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" display: none;"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-lock text-yellow"></i> เข้าสู่ระบบ</h4>
            </div>
            <div class="modal-body">
                กรุณา ระบุชื่อผู้ใช้ และรหัสผ่าน เพื่อความปลอดภัยในการเข้าใช้ข้อมูล<br/><br/>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i> ชื่อผู้ใช้งาน</div>
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-key"></i> รหัสผ่าน</div>
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group" style=" text-align:  right;">
                    <button type="button" class="btn btn-info" onclick="login()"><i class="fa fa-unlock text-green"></i> เข้าสู่ระบบ</button>
                    <button type="button" class="btn btn-info" onclick="reset_login()"><i class="fa fa-remove text-red"></i> ยกเลิก</button>
                    <div id="login_flag"></div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    //เปิดช่องค้นหา
    function popup_dialog() {
        $("#dialog_search").modal();
    }

    //เครีย์ค่า
    function reload_search() {
        $("#cid").val("");
        $("#name").val("");
        $("#lname").val("");
    }

    //หาข้อมูลรายชื่อคน
    function search_patient() {

        var url = "<?php echo Url::to(['search/search_patient']) ?>";
        var cid = $("#cid").val();
        var name = $("#name").val();
        var lname = $("#lname").val();
        var data = {cid: cid, name: name, lname: lname};
        if (cid == '' && name == '' && lname == '') {
            swal("แจ้งเตือน!", "กรองอย่างน้อย 1 ช่อง...!", "warning");
            return false;
        }
        $("#result_patient").html("<center><i class='fa fa-spinner  fa-spin fa-2x'></i></center>");

        $.post(url, data, function (result) {
            $("#result_patient").html(result);
        });
    }

    function get_service(cid, pid, hospcode) {
        $("#PID").val(pid);
        $("#HOSPCODE").val(hospcode);

        get_detail(cid);
        get_drugallergy(hospcode, pid);

        var url = "<?php echo Url::to(['search/get_service']) ?>";
        var data = {cid: cid};
        $("#result_service").html("<center><i class='fa fa-spinner  fa-spin fa-2x'></i></center>");

        $.post(url, data, function (result) {
            $("#result_service").html(result);
            $("#dialog_search").modal("hide");
        });
    }

    function get_detail(cid) {
        var url = "<?php echo Url::to(['search/get_detail_person']) ?>";
        var data = {cid: cid};
        $("#detail_person").html("<center><i class='fa fa-spinner  fa-spin fa-2x'></i></center>");

        $.post(url, data, function (result) {
            $("#detail_person").html(result);
        });
    }
    //************************* เช็ค Login ***********************//
    check_flag_login();
    function check_flag_login() {
        var user = "<?php echo Yii::$app->session['user'] ?>";
        if (user == "") {
            $("#dialog_login").modal();
        }
    }

    function login() {
        var url = "<?php echo Url::to(['site/login']) ?>";
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == "" || password == "") {
            swal("แจ้งเตือน!", "กรอกข้อมูลไม่ครบ...!", "warning");
            return false;
        }

        var data = {username: username, password: password};
        $("#loin_flag").html("<center><i class='fa fa-spinner  fa-spin'></i></center>");

        $.post(url, data, function (result) {
            if (result == '0') {
                swal("แจ้งเตือน!", "ไม่มีข้อมูลผู้ใช้...!", "warning");
            } else {
                window.location.reload();
            }
        });
    }

    function reset_login() {
        $("#username").val("");
        $("#password").val("");
    }

    function logout() {
        var url = "<?php echo Url::to(['site/logout']) ?>";
        var data = {a: 1};

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }
</script>
