<style type="text/css">
    .active-menu-history{
        background: #000000;
        color:#ff6600;
        font-weight: bold;
    }
    #history_full tbody tr .trueprivilege:hover{
        cursor: pointer;
    }
    #history_full tbody tr td{
        font-size: 12px;
        border: #999999 dotted 1px;
        text-align: left;
        color: #ff6600;
    }
    #history_full thead tr th{
        font-size: 12px;
        border-bottom: none;
    }

    #history_full tbody tr .nonPrivilege{
        color: #999999;
    }
</style>
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
        $Privilege = Yii::$app->session['privilege'];
        foreach ($result as $rs): $a++;
            if (in_array($rs['HOSPCODE'], $Privilege)) {
                ?>
                <tr class="trueprivilege" 
                    onclick="active_menu('<?php echo $a; ?>', '<?php echo $rs['HOSPCODE'] ?>', '<?php echo $rs['PID'] ?>', '<?php echo $rs['SEQ'] ?>', '<?php echo $rs['CID'] ?>', '<?php echo $rs['DATE_SERV']; ?>')" id="<?php echo $a; ?>">
                    <td><?php echo $a; ?></td>
                    <td><?php echo $rs['DATE_SERV']; ?></td>
                    <td ><?php echo $rs['HOSPCODE']; ?> <?php echo $rs['HOSPNAME']; ?></td>
                    <td><?php echo "อาการ " . $rs['CHIEFCOMP'] ?></td>
                </tr>
            <?php } else { ?>
                <tr class="nonPrivilege">
                    <td class="nonPrivilege"><?php echo $a; ?></td>
                    <td class="nonPrivilege"><?php echo $rs['DATE_SERV']; ?></td>
                    <td class="nonPrivilege"><?php echo $rs['HOSPCODE']; ?></td>
                    <td class="nonPrivilege"><?php echo "อาการ " . $rs['CHIEFCOMP'] ?></td>
                </tr>
            <?php } ?>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        //$("#list_history").dataTable();
        $('#history_full').dataTable();
    });
</script>