<style type="text/css">
    #tb_epi thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_epi tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>

<table class="table table-striped" id="tb_epi">
    <thead>
        <tr>
            <th>สถานบริการ</th>
            <th>วันที่</th>
            <th>วัคซีน</th>
            <th>อายุ ณ วันที่รับ</th>
            <th>ผู้ให้บริการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rs): ?>
            <tr>
                <td><?php echo $rs['VACCINEPLACE'] ?></td>
                <td><?php echo $rs['DATE_SERV'] ?></td>
                <td><?php echo $rs['VCC_ENG_NAME'] ?></td>
                <td><?php echo $rs['SERVICE_AGE'] ?></td>
                <td><?php echo $rs['PROVIDER'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_epi").dataTable();
    });
</script>