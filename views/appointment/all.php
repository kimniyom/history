<style type="text/css">
    #tb_appoint_all thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_appoint_all tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<table class="table table-striped table-hover" id="tb_appoint_all">
    <thead>
        <tr>
            <th>วันที่นัด</th>
            <th>ประเภทการนัด</th>
            <th>ผู้ให้บริการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rs): ?>
            <tr>
                <td><?php echo $rs['APDATE'] ?></td>
                <td><?php echo $rs['APTYPE'] ?></td>
                <td><?php echo $rs['PROVIDER'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $("#tb_appoint_all").dataTable();
    });
</script>