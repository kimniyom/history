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
            <th>รหัสโรค</th>
            <th>โรคเรื้อรัง</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model as $rs): ?>
            <tr>
                <td><?php echo $rs['CHRONIC'] ?></td>
                <td><?php echo $rs['DIAG_THAI_NAME'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>