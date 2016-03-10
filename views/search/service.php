<style type="text/css">
    .active-menu-history{
        background: #000000;
        color:#ff6600;
        font-weight: bold;
    }

    #list_history tbody tr .trueprivilege:hover{
        cursor: pointer;
    }
    #list_history tbody tr td{
        /*font-size: 12px;*/
        /*border: #999999 dotted 1px;*/
        text-align: left;
        color: #ff6600;
    }
    #list_history thead tr th{
        font-size: 12px;
        border-bottom: none;
        color: #ff6600;
    }

    #list_history tbody tr .nonPrivilege{
        color: #999999;
    }

    #list_history tbody tr td{
        border: none;
    }

    #list_history tbody tr{
        cursor: pointer;
    }
</style>
<?php

use yii\helpers\Url;
?>

<li><a href="javascript:popup_dialog()"><i class="fa fa-search text-yellow"></i> <span style="color: #ff6600;">ค้นหาผู้ป่วย</span></a></li>
<li class="header"><i class="fa fa-user"></i> ประวัติการรับบริการ 
    <button class="btn btn-xs pull-right" onclick="show_service_full()" 
            style="margin: 0px; background: none; padding-right: 0px;"
            data-toggle="tooltip" data-trigger="hover" title="ขยายใหญ่" data-placement="left">
        <i class="fa fa-expand"></i>
    </button>
</li>

<table class="table table-hover" id="list_history" style=" width: 100%; margin-top: 0px;">
    <thead>
        <tr style=" color: #FFF;">
            <th style="display: none;">#</th>
            <th></th>
            <th>วันที่</th>
            <th>สถานบริการ</th>
            <!--
            <th>อาการ</th>
            -->
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $Privilege = Yii::$app->session['privilege'];
        foreach ($result as $rs): $i++;
            if (in_array($rs['HOSPCODE'], $Privilege)) {
                ?>
                <tr class="trueprivilege"
                    onclick="active_menu('<?php echo $i; ?>', '<?php echo $rs['HOSPCODE'] ?>', '<?php echo $rs['PID'] ?>', '<?php echo $rs['SEQ'] ?>', '<?php echo $rs['CID'] ?>', '<?php echo $rs['DATE_SERV']; ?>')" id="<?php echo $i; ?>">
                    <td style=" display: none;"><?php echo $i; ?></td>
                    <td class="nonPrivilege"><i class="fa fa-calendar text-red"></i></td>
                    <td><?php echo $rs['DATE_SERV']; ?></td>
                    <td data-toggle="tooltip" data-trigger="hover" title="<?php echo $rs['HOSPNAME']; ?>" data-placement="top"><?php echo $rs['HOSPCODE']; ?></td>
                    <!--
                    <td><?//php echo "อาการ " . $rs['CHIEFCOMP'] ?></td>
                    -->
                </tr>
            <?php } else { ?>
                <tr class="nonPrivilege">
                    <td style=" display: none;"><?php echo $i; ?></td>
                    <td class="nonPrivilege"><i class="fa fa-calendar text-red"></i></td>
                    <td class="nonPrivilege"><?php echo $rs['DATE_SERV']; ?></td>
                    <!--
                    <td class="nonPrivilege"
                        data-toggle="tooltip" data-trigger="hover" title="<?//php echo $rs['HOSPNAME']; ?>" data-placement="top"><?//php echo $rs['HOSPCODE']; ?>
                    </td>
                    -->
                    <td class="nonPrivilege"><?php echo "อาการ " . $rs['CHIEFCOMP'] ?></td>
                </tr>
            <?php } ?>
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
            "scrollX": true,
            "scrollY": "350px"
        });
    });

    function active_menu(id, hospcode, pid, seq, cid, date) {
        //$(this).addClass("active-menu-history");
        $("#popup-service-full").modal("hide");
        $("#list_history tbody tr").removeClass("active-menu-history");
        $("#history_full tbody tr").removeClass("active-menu-history");
        $("#" + id).each(function () {
            // checks if its the same on the address bar
            $(this).addClass("active-menu-history");
            $("#history_full tbody #" + id).addClass("active-menu-history");
        });

        $("#SEQ").val(seq);
        $("#DATE_SERVICE").val(date);
        get_diag(hospcode, pid, seq);
        get_service_detail(hospcode, cid, seq);
        /*
         drug(hospcode, pid, seq);//ดึงข้อมูลการได้รับยา คำสั่งอยู่ที่ store.js
         procedure_opd(hospcode, pid, seq);//ดึงข้อมูลหัตถการ คำสั่งอยู่ที่ store.js
         appointment(hospcode, pid, seq);//ดึงข้อมูลการนัด คำสั่งอยู่ที่ store.js
         */
    }
</script>