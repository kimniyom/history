<style type="text/css">
    #tb_procedure_opd thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_procedure_opd tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<table class="table table-striped" id="tb_procedure_opd">
    <thead>
        <tr>
            <th>รหัสหัตถการ</th>
            <th>รายการหัตถการ</th>
            <th>ราคาค่าหัตถการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rs): ?>
            <tr>
                <td><?php echo $rs['PROCEDCODE'] ?></td>
                <td><?php echo $rs['THAI_NAME'] ?></td>
                <td><?php echo $rs['SERVICEPRICE'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_procedure_opd").dataTable();
    });
</script>