<?php

use yii\helpers\Url;
?>
<!-- Main content -->
<section class="content">

    <div class="row">

        <!-- Box Comment -->
        <div class="box box-default collapsed-box">
            <div class="box-header with-border" id="bg-nav-line">
                <h3 class="box-title">
                    <i class="fa fa-user"></i> 
                    <!-- ข้อมูลถูกเซ็ตมาจากไฟล์ detail_person -->
                    <span id="person_name">ข้อมูลพื้นฐาน</span>

                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" id="detail_person">
                ยังไม่ได้เลือกข้อมูล
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <div class="row">
        <!--
              <div class="col-md-3">
      
                  <div class="box box-primary">
                      <div class="box-body box-profile">
                          <div id="detail_person">
                              <center>
                                  <img class="profile-user-img img-responsive img-circle" src="<?//php echo Url::to('@web/web/images/No_image.jpg') ?>" alt="User profile picture">
                              </center>
                              <h4 class="profile-username text-center">กรุณาค้นหารายชื่อ ...</h4>
                              <div class="box box-default collapsed-box box-solid disabled">
                                  <div class="box-header with-border">
                                      <h3 class="box-title">ข้อมูลพื้นฐาน</h3>
      
                                  </div>
                                  <div class="box-body" style="padding: 1px;">
      
                                  </div>
                              </div>
                          </div>
                      </div>
      
                  </div>
      
              </div>
        -->

        <div class="nav-tabs-custom" id="bg-nav-line">
            <ul class="nav nav-tabs" id="bg-nav-line">
                <li class="active"><a href="#service_detail" data-toggle="tab"><i class="fa fa-plus-square text-green"></i> ข้อมูลการรับบริการ</a></li>
                <li><a href="#drugallergy" data-toggle="tab"><i class="fa fa-history text-red"></i> ประวัติการแพ้ยา</a></li>
                <li><a href="#chronic" data-toggle="tab" onclick="chronic()"> <i class="fa fa-bug text-blue"></i> โรคเรื้อรัง</a></li>
                <li><a href="#history" data-toggle="tab"><i class="fa fa-hotel text-orange"></i> ประวัติการผ่าตัด</a></li>
            </ul>
            <div class="tab-content" id="content-service">
                <div class="active tab-pane" id="service_detail"><center>ไม่มีข้อมูล ...</center></div>
                <div class="tab-pane" id="drugallergy"><center>ไม่มีข้อมูล ...</center></div>
                <div class="tab-pane" id="chronic"><center>ไม่มีข้อมูล ...</center></div>
                <div class="tab-pane" id="history"><center>ไม่มีข้อมูล ...</center></div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->

        <!--
            ######################## วินิจฉัย  Diagnosis ########################
        -->
        <div class="panel panel-default" style=" border: none;">
            <div class="panel-heading" style="background:#545863; border: none;">
                <h4 class="box-title text-yellow" style=" margin: 0px;"><i class="fa fa-user-md"></i> วินิจฉัย</h4>
            </div>
            <div class="panel-body" style="background:#454954">
                <div id="diagnosis"><p style="color:#FFFFFF;">ไม่มีข้อมูล ...</p></div>
            </div>
        </div>

        <!--
           ######################## ข้อมูลอื่น ๆ ########################
        -->

        <div class="box box-default">
            <div class="box-header"  style="background:#454954">
                <h3 class="box-title text-yellow">ข้อมูลอื่น ๆ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"  style="background:#22252c">

                <!-- Etc Box -->
                <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-info btn-flat btn-block" style="margin-bottom: 10px;" 
                                id="btn-mt"
                                data-toggle="tooltip" data-trigger="hover" title="รายการยา" data-placement="top"
                                onclick="drug('รายการยา')">
                            <i class="fa fa-file-text fa-5x"></i> <br/>รายการยา
                        </button>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-success btn-flat btn-block" style="margin-bottom: 10px;" 
                                id="btn-mt"
                                data-toggle="tooltip" data-trigger="hover" title="หัตถการ" data-placement="top"
                                onclick="procedure('หัตถการ')">
                            <i class="fa fa-stethoscope fa-5x"></i> <br/>หัตถการ
                        </button>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-warning btn-flat btn-block" style="margin-bottom: 10px;"
                                id="btn-mt"
                                data-toggle="tooltip" data-trigger="hover" title="แล็บ" data-placement="top"
                                onclick="labfu('แล็บ')">
                            <i class="fa fa-hospital-o fa-5x"></i> <br/>แล็บ
                        </button>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-danger btn-flat btn-block" style="margin-bottom: 10px;"
                                id="btn-mt"
                                data-toggle="tooltip" data-trigger="hover" title="เอ็กซเรย์" data-placement="top">
                            <i class="fa fa-heartbeat fa-5x"></i> <br/>เอ็กซเรย์
                        </button>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-danger btn-flat btn-block" style="margin-bottom: 10px; background: #545863;" 
                                data-toggle="tooltip" data-trigger="hover" title="การรับวัคซีน" data-placement="top"
                                id="btn-mt"
                                onclick="epi('การรับวัคซีน')">
                            <i class="fa fa-eyedropper fa-5x"></i> <br/>การรับวัคซีน
                        </button>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;"
                                id="btn-mt"
                                data-toggle="tooltip" data-trigger="hover" title="ค่าใช้จ่าย" data-placement="top" onclick="expenses('ค่าใช้จ่าย')">
                            <i class="fa fa-money fa-5x"></i> <br/>ค่าใช้จ่าย
                        </button>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" class="btn btn-success btn-flat btn-block" style="margin-bottom: 10px; background: #89b71a;" 
                                id="btn-mt"
                                data-toggle="tooltip" data-trigger="hover" title="การนัดหมาย" data-placement="top"
                                onclick="appoint('การนัดหมาย')">
                            <i class="fa fa-repeat fa-5x"></i> <br/>การนัดหมาย
                        </button>
                    </div>

                </div>
                <!-- End Etc Box -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>


<!-- 
############# popup get detail show on box popup ###############
-->
<div class="modal" id="popup-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-blue-active">
            <div class="modal-header" style=" border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style=" color: #FFF;"><i class="fa fa-ellipsis-v"></i> <font id="head-popup"></font></h4>
            </div>

            <div id="box-show-detail" style=" background: #FFF; color: #000;"></div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
