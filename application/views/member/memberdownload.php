
<div class="col-lg-12">
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>#</th>
                <th>Filename</th>
                <th>Create date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1 + $page;
            foreach ($files as $each):
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><a target="_blank" href="<?php echo base_url('public/uploads') . '/' . $each->filepath; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
                   <td><a target="_blank" href="<?php echo base_url('public/uploads') . '/' . $each->filepath; ?>"><?php echo $each->filename; ?></a></td>
                    <td><?php echo $each->createdate; ?></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">  <?php echo $this->pagination->create_links(); ?></td>
            </tr>

        </tfoot>
    </table>
</div>