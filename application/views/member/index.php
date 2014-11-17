<div class="col-xs-12">
    <div class="col-xs-12">
        <div class="panel" >
            <div class="panel-body">
                <form class="form-inline" role="form" method="post" action="<?php echo base_url(); ?>/member/index">
                    <div class="form-group">
                        <div class="input-group col-xs-12">

                            <input class="form-control" id="input_search" name="input_search" type="text" placeholder="ค้นหา รหัสพนักงาน ชื่อพนักงาน รหัสสมาชิก" value="<?php echo $prm; ?>"><br>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">ค้นหา</button>
                            </span>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <?php echo $user['isadmin'] == 1 ? "<th>#</th>" : ""; ?>
                <th>รหัสพนักงาน</th>
                <th>รหัสสมาชิก</th>
                <th>ชื่อสมาชิก</th>
                <th>ส่วน</th>
                <th>กลุ่มประกัน</th>
                <th>ข้อมูลประกัน</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1 + $page;
            foreach ($member as $each):
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <?php if ($user['isadmin'] == 1): ?>
                        <td><a href="<?php echo base_url() ?>member/member_setting/<?php echo $each->empid; ?>"><span class="glyphicon glyphicon glyphicon-cog"></span></a></td>
                    <?php endif; ?>
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