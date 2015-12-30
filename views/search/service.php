<style type="text/css">
    .active-menu-history{
        background: #ffff00;
    }
    #list_history tbody tr{
        cursor: pointer;
    }
    #list_history tbody tr td{
        font-size: 12px;
        border: #999999 dotted 1px;
        text-align: left;
        color: #33cc00;
    }
    #list_history thead tr th{
        font-size: 12px;
        border-bottom: none;
    }
</style>
<?php
    use yii\helpers\Url;
?>
<?php
/*
  $i = 0;
  foreach ($result as $rs): $i++;

 * ?>
 */
?>
<!--
    <li>
        <a href="<?//php echo Url::to(['']); ?>" data-toggle="tooltip" data-trigger="hover" title="Popover title" data-placement="top">
            <i class="fa fa-calendar-o text-red"></i> <?//php echo $rs['DATE_SERV'] ?><?//php echo $rs['HOSPCODE'] ?></a>
    </li>
-->
<?php //endforeach; ?>


<li><a href="javascript:popup_dialog()"><i class="fa fa-search text-yellow"></i> <span style="color: #ff6600;">ค้นหาผู้ป่วย</span></a></li>
<li class="header"><i class="fa fa-user"></i> ประวัติการรับบริการ</li>

<table class="table table-hover" id="list_history" style=" width: 100%; margin-top: 0px;">
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
        $i = 0;
        foreach ($result as $rs): $i++;
            ?>
            <tr onclick="active_menu('<?php echo $i; ?>', '<?php echo $rs['HOSPCODE'] ?>', '<?php echo $rs['PID'] ?>', '<?php echo $rs['SEQ'] ?>', '<?php echo $rs['CID'] ?>')" id="<?php echo $i; ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $rs['DATE_SERV']; ?></td>
                <td data-toggle="tooltip" data-trigger="hover" title="<?php echo $rs['HOSPNAME']; ?>" data-placement="top"><?php echo $rs['HOSPCODE']; ?></td>
                <td><?php echo "อาการ " . $rs['CHIEFCOMP'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        //$("#list_history").dataTable();
        $('#list_history').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true
                    //"scrollY": "250px"
        });
    });

    function active_menu(id, hospcode, pid, seq, cid) {
        //$(this).addClass("active-menu-history");
        $("#list_history tbody tr").removeClass("active-menu-history");
        $("#" + id).each(function () {
            // checks if its the same on the address bar
            $(this).addClass("active-menu-history");
        });

        get_diag(hospcode, pid, seq);
        get_service_detail(hospcode, cid, seq);
    }

    function get_diag(hospcode, pid, seq) {
        var url = "<?php echo Url::to(['search/get_diag']) ?>";
        var data = {
            hospcode: hospcode,
            pid: pid,
            seq: seq
        };
        $("#diagnosis").html("<center><i class='fa fa-spinner  fa-spin'></i></center>");

        $.post(url, data, function (result) {
            $("#diagnosis").html(result);
        });
    }

    function get_service_detail(hospcode, cid, seq) {
        var url = "<?php echo Url::to(['search/get_service_detail']) ?>";
        var data = {
            hospcode: hospcode,
            cid: cid,
            seq: seq
        };
        $("#service_detail").html("<center><i class='fa fa-spinner  fa-spin'></i></center>");

        $.post(url, data, function (result) {
            $("#service_detail").html(result);
        });
    }
</script>