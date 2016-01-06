<style type="text/css">
    #tb_drugallergy thead tr th{
        font-size: 12px;
        color: #3333ff;
    }
    #tb_drugallergy tbody tr td{
        color: #ff0000;
        font-size: 12px;
    }
</style>
<?php
$drug = new app\models\Drugallergy;
?>
<table class="table table-striped" id="tb_drugallergy">
    <thead>
        <tr>
            <th>รหัสยา</th>
            <th>ชื่อยา</th>
            <th>ประเภทการวินิจฉัย</th>
            <th>ระดับความรุนแรง</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rs): ?>
            <tr>
                <td><?php echo $rs['DRUGALLERGY'] ?></td>
                <td><?php echo $rs['DNAME'] ?></td>
                <td><?php echo $drug->Type_dx($rs['TYPEDX']) ?></td>
                <td><?php echo $rs['ALEVEL'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>