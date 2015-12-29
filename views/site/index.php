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
                <li><a href="#timeline" data-toggle="tab">ประวัติการแพ้ยา</a></li>
                <li><a href="#settings" data-toggle="tab">โรคเรื้อรัง</a></li>
                <li><a href="#history" data-toggle="tab">ประวัติการผ่าตัด</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="service_detail">ไม่มีข้อมูล ...</div>
                <div class="tab-pane" id="timeline">ไม่มีข้อมูล ...</div>
                <div class="tab-pane" id="settings">ไม่มีข้อมูล ...</div>
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
                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    รายการยา
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-danger">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    หัตถการ
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    แล็บ
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
                                    เอ็กซเรย์
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
                                    การรับวัคซีน
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
                                    ค่าใช้จ่าย
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
                                    การนัดหมาย
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="box-body">
                                ไม่มีข้อมูล ...
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
