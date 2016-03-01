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
<table class="table table-striped" id="tb_drug_opd">
    <thead>
        <tr>
            <th>รหัสยา</th>
            <th>ชื่อยา</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rs): ?>
            <tr>
                <td><?php echo $rs['DIDSTD'] ?></td>
                <td><?php echo $rs['DNAME'] ?></td>
                <td><?php echo $rs['AMOUNT'].$rs['UNIT_NAME'] ?> sddgdg</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_drug_opd").dataTable();
    });
</script>