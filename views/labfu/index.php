<table class="table table-striped" id="tb_labfu">
    <thead>
        <tr>
            <th>#</th>
            <th>LABTEST</th>
            <th>LABRESULT</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = 0;
        foreach ($lab as $rs): 
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $rs['LABTEST'] ?></td>
                <td><?php echo $rs['LABRESULT'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $("#tb_labfu").dataTable();
    });
</script>
