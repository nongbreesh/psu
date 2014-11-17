<div class="col-xs-12" >
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลพนักงาน</h3>
                <div class="pull-right" style="position: absolute;
                     right: 19px;
                     top: 0px;
                     padding: 8px;
                     color: #6D6D6D;">ข้อมูลอัพเดทเมื่อ : <?php echo $memberdetail->updatedate; ?></div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Column</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>รหัสพนักงาน</td>
                            <td><?php echo $memberdetail->empid; ?></td>
                        </tr>
                        <tr>
                            <td>รหัสสมาชิก</td>
                            <td><?php echo $memberdetail->memberid; ?></td>
                        </tr>
                        <tr>
                            <td>ชื่อ - นามสกุล</td>
                            <td><?php echo $memberdetail->fullname; ?></td>
                        </tr>
                        <tr>
                            <td>หมายเลขบัญชี</td>
                            <td><?php echo $memberdetail->account_id; ?></td>
                        </tr>
                        <tr>
                            <td>ระดับ</td>
                            <td><?php echo $memberdetail->level; ?></td>
                        </tr>
                        <tr>
                            <td>ตำแหน่ง</td>
                            <td><?php echo $memberdetail->role; ?></td>
                        </tr>
                        <tr>
                            <td>ภาค</td>
                            <td><?php echo $memberdetail->zonename; ?></td>
                        </tr>
                        <tr>
                            <td>ส่วนงาน</td>
                            <td><?php echo $memberdetail->department; ?></td>
                        </tr>
                        <tr>
                            <td>สถานะ</td>
                            <td><?php echo $memberdetail->statusname; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลประกัน</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>รวม</th>
                            <th>แผน1</th>
                            <th>แผน2</th>
                            <th>แผน3</th>
                            <th>แผน4</th>
                            <th>แผน5</th>
                            <th>แผน6</th>
                            <th>แผน7</th>
                            <th>แผน8</th>
                            <th>แผน9</th>
                            <th>ปี พ.ศ.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><u><b><?php echo $SUMafee; ?></b></u</td>
                            <td><?php echo $memberdetail->afee1; ?></td>
                            <td><?php echo $memberdetail->afee2; ?></td>
                            <td><?php echo $memberdetail->afee3; ?></td>
                            <td><?php echo $memberdetail->afee4; ?></td>
                            <td><?php echo $memberdetail->afee5; ?></td>
                            <td><?php echo $memberdetail->afee6; ?></td>
                            <td><?php echo $memberdetail->afee7; ?></td>
                            <td><?php echo $memberdetail->afee8; ?></td>
                            <td><?php echo $memberdetail->afee9; ?></td>
                            <td><?php echo $memberdetail->byear; ?></td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>