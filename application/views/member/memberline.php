<form method="post" action="<?php echo base_url()?>member/memberline_display">
    <input type="hidden" id="zoneid" />
    <input type="hidden" id="department" />
    <input type="hidden" id="offset" />
    <input id="current_jobstatus"  type="hidden"/>
    <div class="col-xs-12 " >
        <div class="col-xs-12" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">เลือกสังกัด</h3>
                </div>
                <div class="panel-body">
                    <?php foreach ($zone as $each): ?>
                        <div class="form-inline col-xs-6">
                            <input type="checkbox" id="input_zone<?php echo $each->id; ?>" name="input_zone[]" value="<?php echo $each->id; ?>"/> <label for="input_zone<?php echo $each->id; ?>"><?php echo $each->name; ?></label>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 " >
        <center><div id="loding_state"></div></center>

        <div class="col-xs-12 divdepartment" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">เลือกส่วน</h3>
                </div>
                <div class="panel-body divdepartmentbody">

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 " >
        <div class="col-xs-12" >
            <button type="submit" class="btn btn-primary btn-lg" name=""  style="width: 100%;">ค้นหา</button>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('.divdepartment').hide();
        $('input[type=checkbox]').click(function() {
            var zoneid = '';

            $.each($('input:checked'), function(index, value) {
                zoneid += $(value).val() + ',';
            });
            zoneid = zoneid.replace(/,\s*$/, "");
            $('#zoneid').val(zoneid);
            getdepartment(zoneid);
        });

    });
    function checkdepartment() {
        var sList = "";
        $('input[name=input_department]').each(function() {
            if ($(this).is(':checked')) {
                sList += ',' + $(this).val();
            }
        });
        $('#department').val(sList);
    }
    function checkdepartmentall() {
        var sList = "";
        if ($("#input_serviceselectall").is(':checked')) {
            $('input[class=input_department]').each(function() {
                $(this).prop("checked", true);
                sList += ',' + $(this).val();
            });
        } else {
            $('input[class=input_department]').each(function() {
                $(this).prop("checked", false);
            });
        }

        $('#department').val(sList);

    }
    function getdepartment(zoneid) {
        $('#loding_state').html('<img src="<?php echo base_url(); ?>public/img/loading.gif" />');
        $('.divdepartmentbody').html('');
        $.ajax({
            url: "<?php echo base_url(); ?>" + "index.php/member/getdepartment",
            type: "POST",
            data: {'zoneid': zoneid},
            dataType: "html",
            success: function(data) {
                $('#loding_state').html('');
                if (data != '') {
                    $('.divdepartment').show();
                    $('.divdepartmentbody').html(data);
                }
                else {
                    $('.divdepartment').hide();
                }
            },
            error: function(XMLHttpRequest) {
            }
        });
    }
</script>