
<table class="table" id="pcu_in_group">
        <thead>
            <tr>
                <th>#</th>
                <th>HOSPCODE</th>
                <th>HOSNAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($pcu as $rs):
                $i ++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs['off_id'] ?></td>
                    <td><?php echo $rs['off_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#pcu_in_group").DataTable({
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            //"iDisplayLength": 10000, // กำหนดค่า default ของจำนวน record 
            "paging": false,
            "sScrollY": "300px",
            "bFilter": true // แสดง search box
        });
    });</script>
