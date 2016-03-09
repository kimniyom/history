<?php 
    use yii\helpers\Html;
    use yii\helpers\Url;
    use kartik\select2\Select2;
    use yii\helpers\ArrayHelper;
    use app\models\CoOffice;
    use app\models\MasPrename;

    $office = new CoOffice();
    $prename = new MasPrename();
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF;">
        <a href="<?php echo Url::to(['site/index'])?>">
          <i class="fa fa-chevron-left text-yellow"></i> กลับไปหน้าค้นหา
        </a> | 
        <i class="fa fa-pencil text-red"></i> ข้อมูลผู้ใช้งาน
    </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo Url::to(['site/index'])?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <center>
              <img class="profile-user-img img-responsive img-circle" 
              	src="<?php echo Url::to('@web/web/themes/AdminLTE/dist/img/avatar2.png')?>" 
              	alt="User profile picture">
              	</center>
              <h3 class="profile-username text-center">
              	<?php echo $user['username'] ?>
              </h3>

              <p class="text-muted text-center">
              	คุณ <?php echo $user['name'].' '.$user['lname'] ?>
              </p>
              <hr/>
              <p class="text-muted text-center text-red">
              	สังกัด <?php echo $user['off_name'] ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>CID</b> <a class="pull-right"><?php echo $user['card'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b><a class="pull-right"><?php echo $user['email'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tel</b> <a class="pull-right"><?php echo $user['tel'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Create</b> <a class="pull-right"><?php echo $user['create_date'] ?></a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">ประวัติการค้นหาผู้ป่วย</a></li>
              <li><a href="#settings" data-toggle="tab">แก้ไขข้อมูลส่วนตัว</a></li>
              <li><a href="#repassword" data-toggle="tab">เปลี่ยนรหัสผ่าน</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <?php foreach($log as $logs): ?>
                  <li>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo $logs['create_date'] ?></span>
                      <h3 class="timeline-header no-border">
                        <a href="#"><?php echo $logs['person_cid'] ?></a>
                        <?php echo $logs['NAME'].' '.$logs['LNAME'] ?>
                      </h3>
                    </div>
                  </li>
                <?php endforeach; ?>
                  <!-- END timeline item -->
                  
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Prename</label>
                    <div class="col-sm-10">
                			<?php
                			// Multiple select without model
                			$data = ArrayHelper::map($prename->get_prename(), 'OID', 'NAME');
                			echo Select2::widget([
                			    'name' => 'prename',
                          'id' => 'prename',
                			    'value' => $user['prename'],
                			    'data' => $data,
                			    'options' => ['multiple' => false, 'placeholder' => 'Select Prename ...']
                			]);
                			?>
    			           </div>
    		          </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nameupdate" placeholder="Name" 
                      	value="<?php echo $user['name'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Lname</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lnameupdate" placeholder="Lname"
                      	value="<?php echo $user['lname'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Card</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="card_update" placeholder="Card"
                      	value="<?php echo $user['card'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email"
                      	value="<?php echo $user['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" placeholder="userName"
                      	value="<?php echo $user['username'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Tel</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" id="tel" placeholder="Tel"
                      	value="<?php echo $user['tel'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">PCU</label>
                    <div class="col-sm-10">
                			<?php
                			// Multiple select without model
                			$data = ArrayHelper::map($office->get_office(), 'off_id', 'off_name');
                			echo Select2::widget([
                			    'name' => 'hospcode',
                          'id' => 'hospcode',
                			    'value' => $user['hospcode'],
                			    'data' => $data,
                			    'options' => ['multiple' => false, 'placeholder' => 'Select hospcode ...']
                			]);
                			?>
    			         </div>
    		          </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-success" onclick="update_profile()">
                        <i class="fa fa-save"></i> แก้ไขข้อมูล
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              
               <div class="tab-pane" id="repassword">
                <form class="form-horizontal">
                 <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Username</label>
                     <div class="col-sm-9">
                        <input type="text" id="reusername" class="form-control" 
                          value="<?php echo $user['username']?>" readonly/>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">New password</label>
                     <div class="col-sm-9">
                        <input type="password" id="new_password" class="form-control"/>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Re password</label>
                     <div class="col-sm-9">
                        <input type="password" id="re_password" class="form-control" />
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3 control-label"></div>
                    <div class="col-sm-9">
                      <button type="button" class="btn btn-warning" onclick="reset_password()">
                        <i class="fa fa-edit"></i> แก้ไขรหัสผ่าน
                      </button>
                    </div>
                  </div>
                  </form>
               </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php 
  $this->registerJs('
     $(document).ready(function() {
        $("#btn-search").hide();
        $("#btn-search-side").hide();
      });
    ');
?>
    <script type="text/javascript">
      function update_profile(){
        var url = "<?php echo Url::to(['users/update']);?>";
        var prename = $("#prename").val();
        var name = $("#nameupdate").val();
        var lname = $("#lnameupdate").val();
        var card = $("#card_update").val();
        var username = $("#username").val();
        var hospcode = $("#hospcode").val();
        var tel = $("#tel").val();
        var email = $("#email").val();
        var id = "<?php echo $user['id'] ?>";
        if(prename == '' || name == '' || lname == '' || card == '' || username == '' || hospcode == '' || tel == '' || email == ''){
            swal("Alert","กรอกข้อมูลไม่ครบ ...","warning");
            return false;
        }

        var data = {
          id: id,
          prename: prename,
          name: name,
          lname: lname,
          card: card,
          username: username,
          hospcode: hospcode,
          tel: tel,
          email: email
        };

        $.post(url,data,function(success){
          swal("Success"," แก้ไขข้อมูลแล้ว...","success");
          window.location.reload();
        });
      }

      function reset_password(){
        var newpassword = $("#new_password").val();
        var repassword = $("#re_password").val();
        var id = "<?php echo $user['id'] ?>";
        var url = "<?php echo Url::to(['users/repassword']);?>";
        var data = {
          id: id,
          newpassword: newpassword
        };
        if(newpassword == '' || repassword == ''){
          swal("Alert","กรอกข้อมูลไม่ครบ ... !","warning");
          return false;
        }

         if(newpassword != repassword){
          swal("Alert","รหัสผ่านไม่ตรงกัน ... !","warning");
          return false;
        }

         $.post(url,data,function(success){
          window.location="<?php echo Url::to(['site/logout'])?>";
         });
      }
    </script>
