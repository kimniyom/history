<script type="text/javascript">
    $(document).ready(function () {
        $("#group_user").DataTable({
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            //"iDisplayLength": 10000, // กำหนดค่า default ของจำนวน record 
            "paging": true,
            //"scrollCollapse": true,
            //"sScrollY": "300px",
            "bFilter": true // แสดง search box
        });
    });</script>

<table class="table table-striped" id="group_user" >
    <thead>
        <tr>
            <th style="width: 2%;">#</th>
            <th style=" width: 5%;">GroupId</th>
            <th style=" width: 90%;">GroupName</th>
            <th style="text-align: center; width: 3%;">SELECT</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($groupUser as $rs):
            $i ++;
            ?>
            <tr id="<?php echo $i ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $rs['id'] ?></td>
                <td><?php echo $rs['group_name'] ?></td>
                <td style=" text-align: center;"><input type="checkbox" onclick="add_privilege('<?php echo $i ?>', '<?php echo $rs['id'] ?>')"/></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>






<script type="text/javascript">
    function add_privilege(row, groupId) {
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-user/add_privilege']) ?>";
        var userId = "<?php echo $userId?>";
        var data = {
            groupId: groupId,
            userId: userId
        };
        $.post(url, data, function (datas) {
            //$("#log").append("Insert " + datas.hospcode + "<br/>");
            $("#" + row).hide();
            GroupInPrivilege();
        });
    }
</script>


