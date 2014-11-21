<div class="col-xs-12">
    <div class="panel" >
        <div class="panel-body">
            <form class="form-inline" role="form" method="get" action="<?php echo base_url(); ?>member/index">
                <div class="row">
                    <div class="form-group col-xs-4">
                        <label class=" control-label col-xs-3">รหัสพนักงาน</label>
                        <input class="form-control " id="input_empid" name="input_empid" type="text" value="<?php echo $input_empid; ?>"  />
                    </div>
                    <div class="form-group col-xs-4">
                        <label class=" control-label  col-xs-3">ชื่อ</label>
                        <input class="form-control " id="input_firstname" name="input_firstname" type="text" value="<?php echo $input_firstname; ?>"  />
                    </div>
                    <div class="form-group col-xs-4">
                        <label class=" control-label  col-xs-3">สกุล</label>
                        <input class="form-control " id="input_lastname" name="input_lastname" type="text" value="<?php echo $input_lastname; ?>"  />
                    </div>



                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="form-group col-xs-4">
                        <label class=" control-label  col-xs-3">ตำแหน่ง</label>
                        <input class="form-control " id="input_role" name="input_role" type="text" value="<?php echo $input_role; ?>"  />
                    </div>
                    <div class="form-group col-xs-4">
                        <label class=" control-label  col-xs-3">ระดับ</label>
                        <input class="form-control " id="input_level" name="input_level" type="text" value="<?php echo $input_level; ?>"  />
                    </div>
                </div>

                <div  style="padding: 10px 0px 0px 30px">
                    <div class="radio col-xs-3">
                        <label>
                            <input type="radio" name="chk" id="chk_all"  <?php echo $chk == 'chk_all' || $chk == '' ? 'checked="checked"' : ''; ?> value="chk_all"  /> ทุกส่วนงาน
                        </label>
                    </div>
                    <div class="radio col-xs-3">
                        <label>
                            <input type="radio" name="chk" id="chk_mainbranch" <?php echo $chk == 'chk_mainbranch' ? 'checked="checked"' : ''; ?>  value="chk_mainbranch"  /> สำนักงานใหญ่
                        </label>
                    </div>
                    <div class="radio col-xs-3">
                        <label>
                            <input type="radio" name="chk" id="chk_branch" <?php echo $chk == 'chk_branch' ? 'checked="checked"' : ''; ?> value="chk_branch"  /> สาขา
                        </label>
                    </div>
                    <div class="radio col-xs-3">
                        <label>
                            <input type="radio" name="chk" id="chk_department" <?php echo $chk == 'chk_department' ? 'checked="checked"' : ''; ?> value="chk_department"  /> ชื่อส่วนงาน
                        </label>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="form-group col-xs-12"  id="form_zone">


                        <b>ภาค</b>
                        <select class="input-sm" id="input_zone" name="input_zone" >
                            <option value="">กรุณาเลือกสำนักงานภาค</option>
                            <?php foreach ($zone as $each): ?>
                                <?php if ($each->id != 1 && $each->id != 6): ?>
                                    <option  <?php echo $each->id == $input_zone ? 'selected="selected"' : '' ?>   value="<?php echo $each->id; ?>"><?php echo $each->name; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>

                        <select class="input-sm" id="input_subdepartment" name="input_subdepartment" >
                            <option value="">กรุณาเลือก</option>
                        </select>

                    </div>
                    <div class="form-group col-xs-5" id="form_mainbranch">
                        <b>ฝ่าย</b>
                        <select class="input-sm" id="input_branch" name="input_branch" >
                            <option value="">กรุณาเลือกฝ่าย/สำนัก</option>
                            <?php foreach ($mainbranch as $each): ?>
                                <option <?php echo $each->branch == $input_branch ? 'selected="selected"' : '' ?>  value="<?php echo $each->branch; ?>"><?php echo $each->branch; ?></option>?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-5" id="form_department">
                        <b>ชื่อส่วนงาน</b>
                        <input type="text"id="input_department" name="input_department" class="form-control " value="<?php echo $input_department; ?>" /> 
                    </div>
                </div>

                <p style="margin: 0 auto; text-align: center;">
                    <input type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary btn-lg" value="ค้นหา">
                    <input type="button" onclick="exportmember()" id="btnsubmit" name="btnsubmit" class="btn btn-default btn-lg" value="ดาวน์โหลด">
                </p>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12 row">
    <div class="row">
        <table class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <?php echo $user['isadmin'] == 1 ? "<th>#</th>" : ""; ?>
                    <th>รหัสพนักงาน</th>
                    <th>รหัสสมาชิก</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>ระดับ</th>
                    <th>สำนักงานภาค</th>
                    <th>ภาค</th>
                    <th>#</th>
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
                        <td><?php echo $each->role_desc; ?></td>
                        <td><?php echo $each->level; ?></td>
                        <td><?php echo $each->department; ?></td>
                        <td><?php echo $each->zonename; ?></td>
                        <td><a href="<?php echo base_url() ?>member/member_insurance/<?php echo $each->empid; ?>"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">  <?php echo $this->pagination->create_links(); ?></td>
                </tr>

            </tfoot>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {

        $("#input_zone").change(function() {
            getinput_subdepartment($(this).val());
        });
        $('#form_zone').hide();
        $('#form_mainbranch').hide();
        $('#form_department').hide();
        var chk = getParameterByName('chk');
        if (chk == 'chk_mainbranch') {
            $('#form_zone').hide();
            $('#form_mainbranch').show();
            $('#form_department').hide();
        }
        else if (chk == 'chk_branch') {
            $('#form_zone').show();
            $('#form_mainbranch').hide();
            $('#form_department').hide();
        }
        else if (chk == 'chk_department') {
            $('#form_zone').hide();
            $('#form_mainbranch').hide();
            $('#form_department').show();
        }
        else {
            $('#form_zone').hide();
            $('#form_mainbranch').hide();
            $('#form_department').hide();
        }


        $('#chk_mainbranch').change(function() {
            if ($(this).is(":checked")) {
                $('#form_zone').hide();
                $('#form_mainbranch').show();
                $('#form_department').hide();
            }
            else {
                $('#form_mainbranch').hide();
            }
        });
        $('#chk_branch').change(function() {
            if ($(this).is(":checked")) {
                $('#form_zone').show();
                $('#form_mainbranch').hide();
                $('#form_department').hide();
            }
            else {
                $('#form_zone').hide();
            }
        });
        $('#chk_department').change(function() {
            if ($(this).is(":checked")) {
                $('#form_zone').hide();
                $('#form_mainbranch').hide();
                $('#form_department').show();
            }
            else {
                $('#form_department').hide();
            }
        });
        $('#chk_all').change(function() {
            if ($(this).is(":checked")) {
                $('#form_zone').hide();
                $('#form_mainbranch').hide();
                $('#form_department').hide();
            }
            else {
                $('#form_department').hide();
            }
        });
    });
    function getinput_subdepartment(zoneid) {
        $.ajax({
            url: "<?php echo base_url(); ?>" + "index.php/member/getsubdepartment/" + zoneid,
            type: "POST",
            dataType: "json",
            success: function(data) {
                $('#input_subdepartment').html('');
                $('#input_subdepartment').append($('<option></option>').val('').html('กรุณาเลือก'));
                $.each(data.result, function(val, text) {
                    $('#input_subdepartment').append($('<option></option>').val(text.department).html(text.department));
                });
            },
            error: function(XMLHttpRequest) {
                //$.growl(XMLHttpRequest.status, {type: 'danger'}); //danger , info , warning
            }
        });
    }
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function exportmember() {
        var input_empid = $('#input_empid').val();
        var input_firstname = $('#input_firstname').val();
        var input_subdepartment = $('#input_subdepartment').val();
        var input_lastname = $('#input_lastname').val();
        var input_role = $('#input_role').val();
        var input_level = $('#input_level').val();
        var input_zone = $('#input_zone').val();
        var input_branch = $('#input_branch').val();
        var input_department = $('#input_department').val();
        var chk = $('#chk').val();

        location.href = '<?php echo base_url() ?>member/exportmember/?input_empid=' + input_empid + '&input_firstname=' + input_firstname + '&input_lastname=' + input_lastname + '&input_subdepartment=' + input_subdepartment + '&input_role=' + input_role + '&input_level=' + input_level + '&chk=' + chk + '&input_zone=' + input_zone + '&input_branch=' + input_branch + '&input_department=' + input_department + '';
    }
</script>
