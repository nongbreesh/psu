
<div class="col-lg-12">
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>รหัสพนักงาน</th>
                <th>รหัสสมาชิก</th>
                <th>ชื่อสมาชิก</th>
                <th>ส่วน</th>
                <th>กลุ่มประกัน</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1 + $page;
            foreach ($member as $each):
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $each->empid; ?></td>
                    <td><?php echo $each->memberid; ?></td>
                    <td><?php echo $each->fullname; ?></td>
                    <td><?php echo $each->department; ?></td>
                    <td><?php echo $each->zonename; ?></td>
                    <td><a href="<?php echo base_url() ?>member/member_insurance/<?php echo $each->empid; ?>"><span class="glyphicon glyphicon-zoom-in"> ดูเพิ่มเติม</span></a></td>
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