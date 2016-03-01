<style type="text/css">
    #tb_appoint thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_appoint tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }

    #tb_appoint_all thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_appoint_all tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#appointment_now" data-toggle="tab">ครั้งนี้</a></li>
        <li><a href="#appointment_all" data-toggle="tab">ทั้งหมด</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="appointment_now">
            <table class="table table-striped" id="tb_appoint">
                <thead>
                    <tr>
                        <th>วันที่นัด</th>
                        <th>ประเภทการนัด</th>
                        <th>ผู้ให้บริการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appoint as $rs): ?>
                        <tr>
                            <td><?php echo $rs['APDATE'] ?></td>
                            <td><?php echo $rs['APTYPE'] ?></td>
                            <td><?php echo $rs['PROVIDER'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="appointment_all">
            <div class="active tab-pane" id="appointment_all">
                <table class="table table-striped" id="tb_appoint_all">
                    <thead>
                        <tr>
                            <th>วันที่นัด</th>
                            <th>ประเภทการนัด</th>
                            <th>ผู้ให้บริการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appoint_all as $rs): ?>
                            <tr>
                                <td><?php echo $rs['APDATE'] ?></td>
                                <td><?php echo $rs['APTYPE'] ?></td>
                                <td><?php echo $rs['PROVIDER'] ?></td>
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
        $("#tb_appoint,#tb_appoint_all").dataTable();
    });
</script>
