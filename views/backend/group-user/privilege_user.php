<table class="table table-striped" id="privilegeUser">
    <thead>
        <tr>
            <th style="width: 2%;">#</th>
            <th style=" width: 5%;">GroupId</th>
            <th style=" width: 5%;">GroupName</th>
            <th style="text-align: center; width: 2%;">SELECT</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($privilege as $rs):
            $i ++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rs['id'] ?></td>
                <td><?php echo $rs['group_name'] ?></td>
                <td style=" text-align: center;"><input type="checkbox" onclick="delete_privilege('<?php echo $rs['id'] ?>')"/></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    $(document).ready(function () {
        $("#privilegeUser").DataTable({
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            "paging": false,
            "sScrollY": "100px",
            "bFilter": true // แสดง search box
        });
    });

</script>

<script type="text/javascript">
    function delete_privilege(id) {
        var url = "<?php echo Yii::$app->urlManager->createUrl(['backend/group-user/delete_privilege']) ?>";
        var data = {
            id: id
        };
        $.post(url, data, function (datas) {
            GroupInPrivilege();
        });
    }
</script>



