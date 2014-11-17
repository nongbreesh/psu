
<div class="col-lg-12">
    <?php if (!empty($result)): ?>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">อัพเดทข้อมูลเรียบร้อย</div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="col-lg-12"> 
        <!-- Box (with bar chart) -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">User list</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover todo-list ">
                    <thead>
                        <tr>
                            <th><strong>ภาค</strong></th>
                            <th><strong>Permission group</strong></th>
                            <th><strong>#</strong></th>
                        </tr>
                    </thead>
                    <tbody id="cate_list">
                        <?php
                        $x = 1;
                        foreach ($zone as $each):
                            ?>
                            <tr>
                                <td><?php echo $each->name; ?></td>
                                <td><?php echo $each->permission_name; ?></td>
                                <td><a href="javascript:;" onclick="edit_permission(<?php echo $each->id; ?>);"><span class="glyphicon glyphicon glyphicon-cog"></span></a></td>
                            </tr>
                            <?php
                            $x++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer -->
        </div><!-- /.box -->        




    </div><!-- /.Left col -->

    <!-- Modal -->
    <div class="modal fade" id="ins_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_editfile" enctype="multipart/form-data" name="form_editfile"  method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขสิทธิ์</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="zone_id" name="zone_id" />
                        <div class="col-xs-12">


                            <div class="box-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Column</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ภาค</td>
                                            <td><labe id="permission_name"></labe></td>
                                    </tr>

                                    <tr>
                                        <td>Permission</td>
                                        <td>
                                            <select class="input-sm" id="input_permission" name="input_permission" >
                                                <?php foreach ($permission as $each): ?>
                                                    <option value="<?php echo $each->id; ?>"><?php echo $each->permission_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->


                            <div style="clear: both;"></div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="input_editfile" name="input_editfile" value="input_editfile">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function edit_permission(id) {
            $('#zone_id').val(id);
            $.ajax({
                url: "<?php echo base_url(); ?>" + "index.php/setting/getzonebyid/" + id,
                type: "POST",
                data: {'id': id},
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#permission_name').html(data.result.name);
                    $('#input_permission').val(data.result.permission_id);

                    $('#ins_popup').modal('show');

                },
                error: function(XMLHttpRequest) {
                    //$.growl(XMLHttpRequest.status, {type: 'danger'}); //danger , info , warning
                }
            });
        }
    </script>


</div>