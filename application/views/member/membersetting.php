<div class="col-xs-12" >
    <?php if (!empty($result)): ?>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">อัพเดทข้อมูลเรียบร้อย</div>
        <?php endif; ?>
    <?php endif; ?>
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
                <form method="post" id="form_edit"  >
                    <input type="hidden" id="empid" name="empid" value="<?php echo $memberdetail->empid; ?>" />
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
                                <td><input id="input_fullname" name="input_fullname"  class="input-sm" value="<?php echo $memberdetail->fullname; ?>" /></td>
                            </tr>
                            <tr>
                                <td>หมายเลขบัญชี</td>
                                <td><input  id="input_account_id" name="input_account_id" class="input-sm" value="<?php echo $memberdetail->account_id; ?>" /></td>
                            </tr>
                            <tr>
                                <td>ระดับ</td>
                                <td><input  id="input_level" name="input_level" class="input-sm" value="<?php echo $memberdetail->level; ?>" /></td>
                            </tr>
                            <tr>
                                <td>ตำแหน่ง</td>
                                <td><input  id="input_role" name="input_role" class="input-sm" value="<?php echo $memberdetail->role; ?>" /></td>
                            </tr>
                            <tr>
                                <td>ภาค</td>
                                <td>
                                    <select class="input-sm" id="input_zoneid" name="input_zoneid" >
                                        <?php foreach ($zone as $each): ?>
                                            <option <?php echo $memberdetail->zone_id == $each->id ? 'selected="selected"' : ''; ?> value="<?php echo $each->id; ?>"><?php echo $each->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                            </tr>
                            <tr>
                                <td>ส่วนงาน</td>
                                <td><input  id="input_department" name="input_department" class="input-sm" value="<?php echo $memberdetail->department; ?>" /></td>
                            </tr>
                            <tr>
                                <td>สถานะ</td>
                                <td>
                                    <select class="input-sm" id="input_statusid" name="input_statusid" >
                                        <?php foreach ($empstatus as $each): ?>
                                            <option <?php echo $memberdetail->statusname == $each->statusname ? 'selected="selected"' : ''; ?> value="<?php echo $each->id; ?>"><?php echo $each->statusname; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                            </tr>
                            <tr>
                                <td>Permission</td>
                                <td>
                                    <select class="input-sm" id="input_permission" name="input_permission" >
                                        <?php foreach ($permission as $each): ?>
                                            <option <?php echo $memberdetail->user_permission == $each->id ? 'selected="selected"' : ''; ?> value="<?php echo $each->id; ?>"><?php echo $each->permission_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                            </tr>
                        </tbody>
                    </table>
                    <input type="submit"  id="input_btneditinfo" name="input_btneditinfo" class="btn btn-primary pull-right" value="Save changes" />
                </form>
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
                            <th>#</th>
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
                            <?php if ($user['isadmin'] == 1): ?>
                                <td><a href="javascript:;" onclick="ins_popup(<?php echo $memberdetail->bid; ?>);"><span class="glyphicon glyphicon glyphicon-cog"></span></a></td>
                            <?php endif; ?>
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


<!-- Modal -->
<div class="modal fade" id="ins_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_editins"  >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลประกัน</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="isu_id" name="isu_id" />
                    <div class="col-xs-12">
                        <div class="form-group form-inline">
                            <label class="col-xs-4" for="input_year">ปี พ.ศ. : </label>
                            <input id="input_year" name="input_year" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label  class="col-xs-4"  for="input_afee1">แผน1 : </label>
                            <input id="input_afee1" name="input_afee1" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label   class="col-xs-4"  for="input_afee2">แผน2 : </label>
                            <input  id="input_afee2" name="input_afee2" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label   class="col-xs-4"  for="input_afee3">แผน3 : </label>
                            <input  id="input_afee3" name="input_afee3" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label  class="col-xs-4"   for="input_afee4">แผน4 : </label>
                            <input  id="input_afee4" name="input_afee4" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label  class="col-xs-4"  for="input_afee5">แผน5 : </label>
                            <input  id="input_afee5" name="input_afee5" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label   class="col-xs-4"  for="input_afee6">แผน6 : </label>
                            <input  id="input_afee6" name="input_afee6" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label   class="col-xs-4"  for="input_afee7">แผน7 : </label>
                            <input  id="input_afee7" name="input_afee7" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label  class="col-xs-4"   for="input_afee8">แผน8 : </label>
                            <input  id="input_afee8" name="input_afee8" class="input-sm"  />
                        </div>
                        <div class="form-group form-inline">
                            <label   class="col-xs-4"  for="input_afee9">แผน9 : </label>
                            <input  id="input_afee9" name="input_afee9" class="input-sm"  />
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit"  id="input_btneditins" name="input_btneditins" class="btn btn-primary" value="Save changes" />
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function ins_popup(id) {
        $('#isu_id').val(id);

        $.ajax({
            url: "<?php echo base_url(); ?>" + "index.php/member/getisu/" + id,
            type: "POST",
            data: {'id': id},
            dataType: "json",
            success: function(data) {
                $('#input_afee1').val(data.result.afee1);
                $('#input_afee2').val(data.result.afee2);
                $('#input_afee3').val(data.result.afee3);
                $('#input_afee4').val(data.result.afee4);
                $('#input_afee5').val(data.result.afee5);
                $('#input_afee6').val(data.result.afee6);
                $('#input_afee7').val(data.result.afee7);
                $('#input_afee8').val(data.result.afee8);
                $('#input_afee9').val(data.result.afee9);
                $('#input_year').val(data.result.year);
                $('#ins_popup').modal('show');

            },
            error: function(XMLHttpRequest) {
                //$.growl(XMLHttpRequest.status, {type: 'danger'}); //danger , info , warning
            }
        });


    }
</script>