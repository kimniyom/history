<style type="text/css">
    #tb_opd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_opd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }

    #tb_ipd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_ipd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#opd" data-toggle="tab">ป่วยนอก</a></li>
        <li><a href="#ipd" data-toggle="tab">ป่วยใน</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="opd">
            <table class="table table-striped" id="tb_opd">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>หมวดค่าบริการ</th>
                        <th style=" text-align: center;">ราคา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sum = 0;
                    $i = 0;
                    foreach ($opd as $rs):
                        $i++;
                        $sum = $sum + $rs['PRICE'];
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rs['CHARGEITEM_NAME'] ?></td>
                            <td style=" text-align: right;"><?php echo $rs['PRICE'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align: center;" colspan="2"><b>รวม</b></td>
                        <td style=" text-align:  right; color: #ff0000;"><?php echo number_format($sum, 2) ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="tab-pane" id="ipd">
            <table class="table table-striped" id="tb_ipd">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>หมวดค่าบริการ</th>
                        <th style=" text-align: center;">ราคา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sumipd = 0;
                    $i = 0;
                    foreach ($ipd as $rs):
                        $i++;
                        $sumipd = $sumipd + $rs['PRICE'];
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rs['CHARGEITEM_NAME'] ?></td>
                            <td style=" text-align: right;"><?php echo $rs['PRICE'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align: center;" colspan="2"><b>รวม</b></td>
                        <td style=" text-align:  right; color: #ff0000;"><?php echo number_format($sumipd, 2) ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->

<script>
    $(document).ready(function () {
        $("#tb_opd,#tb_ipd").dataTable();
    });
</script>
