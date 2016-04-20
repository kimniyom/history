<table class="table table-striped" id="pcu_out_group">
    <thead>
        <tr>
            <th style="width: 2%;">#</th>
            <th style=" width: 5%;">DISTID</th>
            <th style=" width: 5%;">HOSPCODE</th>
            <th>HOSNAME</th>
            <th style="text-align: center; width: 2%;">SELECT</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($pcu as $rs):
            $i ++;
            ?>
            <tr id="<?php echo $i ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $rs['distid'] ?></td>
                <td><?php echo $rs['off_id'] ?></td>
                <td><?php echo $rs['off_name'] ?></td>
                <td style=" text-align: center;"><input type="checkbox" onclick="add_pcu('<?php echo $i ?>', '<?php echo $rs['off_id'] ?>')"/></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#pcu_out_group").DataTable({
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            //"iDisplayLength": 10000, // กำหนดค่า default ของจำนวน record
            "paging": false,
            "sScrollY": "300px",
            "bFilter": true // แสดง search box
        });
    });</script>

<script type="text/javascript">
    function add_pcu(row, hospcode) {
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-pcu/add_pcu']) ?>";
        var groupId = "<?php echo $groupId ?>";
        var data = {
            groupId: groupId,
            hospcode: hospcode
        };
        $.post(url, data, function (datas) {
            //$("#log").append("Insert " + datas.hospcode + "<br/>");
            $("#" + row).hide();
        }, "json");
    }
</script>
