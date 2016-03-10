<style type="text/css">
    #tb_proced_opd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_proced_opd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }

    #tb_proced_ipd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_proced_ipd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#proced_opd" data-toggle="tab">ป่วยนอก</a></li>
        <li><a href="#proced_ipd" data-toggle="tab">ป่วยใน</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="proced_opd">
            <table class="table table" id="tb_proced_opd">
                <thead>
                    <tr>
                        <th>รหัสหัตถการ</th>
                        <th>รายการหัตถการ</th>
                        <th>ราคาค่าหัตถการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proced_opd as $rs): ?>
                        <tr>
                            <td><?php echo $rs['PROCEDCODE'] ?></td>
                            <td><?php echo $rs['THAI_NAME'] ?></td>
                            <td><?php echo $rs['SERVICEPRICE'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="proced_ipd">
            <div class="active tab-pane" id="proced_ipd">
                <table class="table table-striped" id="tb_proced_ipd">
                    <thead>
                        <tr>
                            <th>รหัสหัตถการ</th>
                            <th>รายการหัตถการ</th>
                            <th>ราคาค่าหัตถการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proced_ipd as $rs): ?>
                            <tr>
                                <td><?php echo $rs['PROCEDCODE'] ?></td>
                                <td><?php echo $rs['THAI_NAME'] ?></td>
                                <td><?php echo $rs['SERVICEPRICE'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->

<script>
    $(document).ready(function () {
        $("#tb_proced_opd,#tb_proced_ipd").dataTable();
    });
</script>
