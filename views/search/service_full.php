
<?php

use yii\helpers\Url;
?>

<table class="table table-hover" id="history_full">
    <thead>
        <tr>
            <th>#</th>
            <th>วันที่</th>
            <th>สถานบริการ</th>
            <th>อาการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $a = 0;
        foreach ($result as $rs): $a++;
            ?>
            <tr onclick="active_menu('<?php echo $a; ?>', '<?php echo $rs['HOSPCODE'] ?>', '<?php echo $rs['PID'] ?>', '<?php echo $rs['SEQ'] ?>', '<?php echo $rs['CID'] ?>', '<?php echo $rs['DATE_SERV']; ?>')" id="<?php echo $a; ?>">
                <td><?php echo $a; ?></td>
                <td><?php echo $rs['DATE_SERV']; ?></td>
                <td ><?php echo $rs['HOSPCODE']; ?> <?php echo $rs['HOSPNAME']; ?></td>
                <td><?php echo "อาการ " . $rs['CHIEFCOMP'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        //$("#list_history").dataTable();
        $('#history_full').dataTable();
    });
</script>