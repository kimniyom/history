<style type="text/css">
    #tb_diagnosis{ font-size: 12px; color: #005983;}
</style>
<table class="table table-striped" id="tb_diagnosis">
    <thead>
        <tr>
            <th>#</th>
            <th>รหัส ICD10</th>
            <th>รายละเอียด</th>
            <th>คลินิค</th>
            <th>ประเภทการวินิจฉัย</th>
            <th>ผู้ให้บริการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($result as $rs): $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rs['DIAGCODE']; ?></td>
                <td><?php echo $rs['DIAGNAME']; ?></td>
                <td><?php echo $rs['CLINIC']; ?></td>
                <td><?php echo $rs['DIAGTYPE']; ?></td>
                <td><?php echo $rs['PROVIDER']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
