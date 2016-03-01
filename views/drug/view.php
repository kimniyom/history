<style type="text/css">
    #tb_drug_opd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_drug_opd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }

    #tb_drug_ipd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_drug_ipd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#drug_opd" data-toggle="tab">ป่วยนอก</a></li>
        <li><a href="#drug_ipd" data-toggle="tab">ป่วยใน</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="drug_opd">
            <table class="table table-striped" id="tb_drug_opd">
                <thead>
                    <tr>
                        <th>รหัสยา</th>
                        <th>ชื่อยา</th>
                        <th>จำนวน</th>
                        <th>ผู้จ่ายยา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($drug_opd as $rs): ?>
                        <tr>
                            <td><?php echo $rs['DIDSTD'] ?></td>
                            <td><?php echo $rs['DNAME'] ?></td>
                            <td><?php echo $rs['AMOUNT'] . " " . $rs['UNIT_NAME'] ?></td>
                            <td><?php echo $rs['PRIVIDER_NAME'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="drug_ipd">
            <div class="active tab-pane" id="drug_ipd">
                <table class="table table-striped" id="tb_drug_ipd">
                    <thead>
                        <tr>
                            <th>รหัสยา</th>
                            <th>ชื่อยา</th>
                            <th>จำนวน</th>
                            <th>ผู้จ่ายยา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($drug_ipd as $rs): ?>
                            <tr>
                                <td><?php echo $rs['DIDSTD'] ?></td>
                                <td><?php echo $rs['DNAME'] ?></td>
                                <td><?php echo $rs['AMOUNT'] . " " . $rs['UNIT_NAME'] ?></td>
                                <td><?php echo $rs['PRIVIDER_NAME'] ?></td>
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
        $("#tb_drug_opd,#tb_drug_ipd").dataTable();
    });
</script>
