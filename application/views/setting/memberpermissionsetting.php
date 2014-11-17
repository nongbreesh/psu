
<div class="col-lg-12">
    <?php if (!empty($result)): ?>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">อัพเดทข้อมูลเรียบร้อย</div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="col-xs-4" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">สร้างกลุ่ม Permission</h3>
            </div>
            <div class="panel-body">
                <form role="form" id="form_add_cate" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input required="required" type="text" class="form-control" id="input_name" name="input_name" placeholder="Enter Permission name">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" value="1" id="input_isview" name="input_isview"> View
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input  type="checkbox"  value="1" id="input_isedit" name="input_isedit"> Edit
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input  type="checkbox"  value="1" id="input_isdownload" name="input_isdownload"> Download
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input  type="checkbox"  value="1" id="input_issuperuser" name="input_issuperuser"> Superuser
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input  type="checkbox"  value="1" id="input_isadmin" name="input_isadmin"> Admin
                            </label>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="input_addcate">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8"> 
        <!-- Box (with bar chart) -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Permission list</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover todo-list ">
                    <thead>
                        <tr>
                            <th><strong>ID</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>View</strong></th>
                            <th><strong>Edit</strong></th>
                            <th><strong>Download</strong></th>
                            <th><strong>Superuser</strong></th>
                            <th><strong>Admin</strong></th>
                            <th><strong>#</strong></th>
                        </tr>
                    </thead>
                    <tbody id="cate_list">

                        <?php
                        $x = 1;
                        foreach ($permissions as $each):
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $each->permission_name; ?></td>
                                <td><?php echo $each->permission_isview == '1' ? 'YES' : 'NO'; ?></td>
                                <td><?php echo $each->permission_isedit == '1' ? 'YES' : 'NO'; ?></td>
                                <td><?php echo $each->permission_isdownload == '1' ? 'YES' : 'NO'; ?></td>
                                <td><?php echo $each->permission_issuperuser == '1' ? 'YES' : 'NO'; ?></td>
                                <td><?php echo $each->permission_isadmin == '1' ? 'YES' : 'NO'; ?></td>
                                <td><a href="javascript:;" onclick="return remove_permission(<?php echo $each->id; ?>);"><span class="glyphicon glyphicon-remove"></span></a></td>
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
    <div class="modal fade" id="file_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_editfile" enctype="multipart/form-data" name="form_editfile"  method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขไฟล์</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="file_id" name="file_id" />
                        <input type="hidden" id="file_name" name="file_name" />
                        <div class="col-xs-12">


                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group input-group-sm col-lg-12">
                                        <input name="input_file"  id="input_file"  class="form-control" type="file" class="inputFile" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-flat" id="btn_image_upload" type="button">Upload</button>
                                        </span>

                                    </div> </div>
                                <?php foreach ($zone as $each): ?>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="<?php echo $each->id; ?>" id="input_zone<?php echo $each->id; ?>" name="input_zone[]"> <?php echo $each->name; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
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
        function remove_permission(id) {
            if (confirm('Are you sure?')) {
                location.href = "<?php echo base_url(); ?>index.php/setting/remove_permission/" + id
            }
            else {
                return false;
            }
        }
    </script>


</div>