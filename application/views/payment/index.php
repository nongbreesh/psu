<div class="col-xs-12">
    <?php if (!empty($result)): ?>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">อัพเดทข้อมูลเรียบร้อย</div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="panel col-sm-6 " >
        <div class="panel-heading">
            <h3 class="panel-title">เช็คสถานะการจ่ายเงิน</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="get" >
                <div class="row">
                    <div class="form-group">
                        <label for="input_empid" class="col-sm-4 control-label">รหัสพนักงาน</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_empid" name="input_empid" value="<?php echo $input_empid; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_firstname" class="col-sm-4 control-label">ชื่อ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_firstname" name="input_firstname"  value="<?php echo $input_firstname; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_lastname" class="col-sm-4 control-label">สกุล</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_lastname" name="input_lastname"  value="<?php echo $input_lastname; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <input type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary btn-lg" value="ค้นหา">
                        </div>
                    </div>




                </div>
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
                    <th>ส่วน</th>
                    <th>ภาค</th>
                    <th>สถานะสมาชิก</th>
                    <th>วันที่ชำระเงิน</th>
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
                            <td><a href="javascript:;" onclick="payment_setting(<?php echo $each->empid; ?>)"><span class="glyphicon glyphicon glyphicon-cog"></span></a></td>
                        <?php endif; ?>
                        <td><?php echo $each->empid; ?></td>
                        <td><?php echo $each->memberid; ?></td>
                        <td><?php echo $each->fullname; ?></td>
                        <td><?php echo $each->zonename; ?></td>
                        <td><?php echo $each->department; ?></td>
                        <td><?php echo ($each->member_year - 543) == date('Y') ? '<span style="color:green">ACTIVE</span>' : '<span style="color:red">EXPIRED</span>'; ?></td>
                        <td><?php echo $each->payment_date; ?></td>
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

<!-- Modal -->
<div class="modal fade" id="form_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_editfile" class="form-horizontal"  enctype="multipart/form-data" name="form_editfile"  method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">ข้อมูลการชำระเงิน <label id="empname"></label></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="empid" name="empid" />
                    <div class="col-xs-12">


                        <div class="box-body">
                            <div class="form-group">
                                <label for="input_paymentmoney" class="col-sm-4 control-label">จำนวนเงิน</label>
                                <div class="col-sm-8">
                                    <input type="number" required="required" class="form-control" id="input_paymentmoney" name="input_paymentmoney" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_paymentdate" class="col-sm-4 control-label">วันที่ชำระเงิน</label>
                                <div class="col-sm-8">
                                    <input type="datetime" required="required" class="form-control" id="input_paymentdate" name="input_paymentdate"  />
                                </div>
                            </div>
                        </div><!-- /.box-body -->


                        <div style="clear: both;"></div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="input_submit" name="input_submit" value="input_submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    function payment_setting(empid) {
        $.ajax({
            url: "<?php echo base_url(); ?>" + "index.php/payment_info/getmemberpayment",
            type: "POST",
            data: {'empid': empid},
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#empid').val(data.result.empid);
                $('#empname').html(data.result.fullname);

                //$('#input_paymentmoney').val(data.result.payment_amount);
                //$('#input_paymentdate').val('');


                $('#form_popup').modal('show');
            },
            error: function (XMLHttpRequest) {
                //$.growl(XMLHttpRequest.status, {type: 'danger'}); //danger , info , warning
            }
        });
    }

</script>
