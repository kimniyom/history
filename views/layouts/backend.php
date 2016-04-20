<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AdminLteAsset;
use app\assets\Geoxml3Asset;
use app\assets\JsAsset;
use app\assets\BackendAsset;
use yii\helpers\Url;

AdminLteAsset::register($this);
BackendAsset::register($this);
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
    </head>
    <body class="skin-red fixed">
        <?php $this->beginBody() ?>

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b><img src="<?php echo Url::to("@web/web/images/history-icon.png") ?>" width="32"/></b> ประวัติผู้ป่วย</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="<?php echo Url::to(['site/index'])?>" class="dropdown-toggle">
                                    <i class="fa fa-search"></i>
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
                                            <!--
                                              <div class="row">
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
                                            <a href="<?php echo Url::to(['users/index'])?>" class="btn btn-default btn-flat"><i class="fa fa-cog text-green"></i> ส่วนตัว</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo Url::to(['site/logout'])?>" class="btn btn-default btn-flat"><i class="fa fa-power-off text-red"></i> ออกจากระบบ</a>
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
            <aside class="main-sidebar" id="sitebar-left">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" id="result_service">
                        <li class="header" id="head-sitebar"><i class="fa fa-user"></i> เมนูผู้ดูแลระบบ</li>
                        <li><a href="<?php echo Url::to(['backend/masuser']) ?>"><i class="fa fa-search text-red"></i> <span style="color: #ff6600;">ผู้ใช้งาน</span></a></li>
                        <li><a href="javascript:popup_dialog()"><i class="fa fa-search text-red"></i> <span style="color: #ff6600;">สิทธิ์การใช้งาน</span></a></li>
                        <li><a href="<?php echo Url::to(['backend/group-user']) ?>"><i class="fa fa-search text-red"></i> <span style="color: #ff6600;">กลุ่มสถานบริการ</span></a></li>
                    </ul>

                    <br/><br/>

                    <font style=" font-size: 12px; color: #cccccc;">
                    สำนักงานสาธารณสุขจังหวัดตาก<br/>
                    เวอร์ชัน 2015
                    </font>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="bg-content">
                <!-- Content Header (Page header) -->
                <section class="content-header"
                  style="margin: 0px;padding: 0px; border-radius: 0px;"
                  id="navigator">
                    <h4 style="margin: 0px; font-size: 14px;" id="navigator">
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
                <strong>Copyright &copy; 2015-2016 </strong>
            </footer>
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>



<script type="text/javascript">
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

</script>
