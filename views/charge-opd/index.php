<style type="text/css">
    #tb_drug_opd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_drug_opd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>
<?php
$drug = new app\models\Drugallergy;
?>
<table class="table table-striped" id="tb_charge_opd">
    <thead>
        <tr>
            <th>หมวดค่าบริการ</th>
            <th>ราคา</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sum = 0;
        foreach ($result as $rs):
            $sum = $sum + $rs['PRICE'];
            ?>
            <tr>
                <td><?php echo $rs['CHARGEITEM'] ?></td>
                <td><?php echo $rs['PRICE'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td style="text-align: center;"><b>รวม</b></td>
            <td><?php echo number_format($sum,2) ?></td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_charge_opd").dataTable();
    });
</script>