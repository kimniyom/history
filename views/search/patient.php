
<div class="box box-success">
    <div class="box-header with-border">รายชื่อที่ค้นหา</div>
    <div class="box-body">
        <table class="table table-striped" id="tb_patient">
            <thead>
                <tr>
                    <th>#</th>
                    <th>เลขบัตรประชาชน</th>
                    <th>ชื่อ - สกุล</th>
                    <th>เพศ</th>
                    <th>อายุ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($result as $rs): $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rs['CID']; ?></td>
                        <td><?php echo $rs['PERSONNAME']; ?></td>
                        <td><?php echo $rs['SEX']; ?></td>
                        <td><?php echo $rs['AGE']; ?></td>
                        <td><a href="javascript:get_service('<?php echo $rs['CID'] ?>','<?php echo $rs['PID']; ?>','<?php echo $rs['HOSPCODE']; ?>')"><i class="fa fa-eye text-blue"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_patient").dataTable();
    });
</script>