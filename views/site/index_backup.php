<?php

use yii\helpers\Url;
?>
<!-- Main content -->
<section class="content">

    <div class="row">

        <!-- Box Comment -->
        <div class="box box-info collapsed-box">
            <div class="box-header with-border bg-blue-gradient">
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

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#service_detail" data-toggle="tab">ข้อมูลการรับบริการ</a></li>
                <li><a href="#drugallergy" data-toggle="tab">ประวัติการแพ้ยา</a></li>
                <li><a href="#chronic" data-toggle="tab" onclick="chronic()">โรคเรื้อรัง</a></li>
                <li><a href="#history" data-toggle="tab">ประวัติการผ่าตัด</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="service_detail">ไม่มีข้อมูล ...</div>
                <div class="tab-pane" id="drugallergy">ไม่มีข้อมูล ...</div>
                <div class="tab-pane" id="chronic">ไม่มีข้อมูล ...</div>
                <div class="tab-pane" id="history">ไม่มีข้อมูล ...</div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->

        <!--
            ######################## วินิจฉัย  Diagnosis ########################
        -->
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-user-md"></i> วินิจฉัย
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div id="diagnosis">ไม่มีข้อมูล ...</div>
            </div>
        </div>

        <!--
           ######################## ข้อมูลอื่น ๆ ########################
        -->

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลอื่น ๆ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <!-- Etc Box -->
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;" onclick="drug('รายการยา')">
                            <i class="fa fa-file-text fa-2x text-green"></i> <br/>รายการยา
                        </button>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;" onclick="procedure_opd('หัตถการ')">
                            <i class="fa fa-stethoscope fa-2x text-blue"></i> <br/>หัตถการ
                        </button>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;">
                            <i class="fa fa-hospital-o fa-2x text-orange"></i> <br/>แล็บ
                        </button>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;">
                            <i class="fa fa-heartbeat fa-2x text-red"></i> <br/>เอ็กซเรย์
                        </button>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;">
                            <i class="fa fa-eyedropper fa-2x text-blue"></i> <br/>การรับวัคซีน
                        </button>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;">
                            <i class="fa fa-money fa-2x text-green"></i> <br/>ค่าใช้จ่าย
                        </button>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" class="btn btn-default btn-flat btn-block" style="margin-bottom: 10px;" onclick="appoint('การนัดหมาย')">
                            <i class="fa fa-repeat fa-2x text-red"></i> <br/>การนัดหมาย
                        </button>
                    </div>

                </div>
                <!-- End Etc Box -->

                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-file-text"></i> รายการยา
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                                <div id="drug_opd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-danger">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <i class="fa fa-stethoscope text-warning"></i> หัตถการ
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                <div id="procedure_opd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <i class="fa fa-hospital-o text-warning"></i> แล็บ
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-info">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <i class="fa fa-heartbeat text-warning"></i> เอ็กซเรย์
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-warning">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    <i class="fa fa-eyedropper text-primary"></i> การรับวัคซีน
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-default">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                    <i class="fa fa-money text-success"></i> ค่าใช้จ่าย
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                    <i class="fa fa-repeat text-red"></i> การนัดหมาย
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="box-body">

                            </div>
                        </div>
                    </div>
                </div>
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
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style=" color: #cccccc;"><i class="fa fa-ellipsis-v"></i> <font id="head-popup"></font></h4>
            </div>
            <div class="modal-body">
                <div id="box-show-detail"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-remove text-red"></i></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
