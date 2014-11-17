
<div class="col-lg-12">
    <?php if (!empty($result)): ?>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">อัพเดทข้อมูลเรียบร้อย</div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="col-xs-4" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">อัพโหลดไฟล์เอกสาร</h3>
            </div>
            <div class="panel-body">
                <form id="form_addfile" enctype="multipart/form-data" name="form_addfile"  method="post">

                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group input-group-sm col-lg-12">
                                <input name="input_file"  id="input_file"  class="form-control" type="file" class="inputFile" />
                            </div> </div>
                        <?php foreach ($zone as $each): ?>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="<?php echo $each->id; ?>" id="input_zone<?php echo $each->name; ?>" name="input_zone[]"> <?php echo $each->name; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="input_addfile" name="input_addfile" value="input_addfile">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8"> 
        <!-- Box (with bar chart) -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">รายการไฟล์เอกสาร</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover todo-list ">
                    <thead>
                        <tr>
                            <th><strong>ลำดับ</strong></th>
                            <th><strong>ชื่อไฟล์</strong></th>
                            <th><strong>วันที่สร้าง</strong></th>
                            <th><strong>#</strong></th>
                        </tr>
                    </thead>
                    <tbody id="cate_list">
                        <?php
                        $i = 1;
                        foreach ($files as $each):
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><a target="_blank" href="<?php echo base_url('public/uploads') . '/' . $each->filepath; ?>"><?php echo $each->filename; ?></a></td>
                                <td><?php echo $each->createdate; ?></td>
                                <td><a href="javascript:;" onclick="editfile(<?php echo $each->id; ?>)"><span class="glyphicon glyphicon-cog"></span></a></td>
                            </tr>
                            <?php
                        endforeach;
                        $i++;
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
        function editfile(id) {
            $('#file_id').val(id);

            $.ajax({
                url: "<?php echo base_url(); ?>" + "index.php/setting/getfile/" + id,
                type: "POST",
                data: {'id': id},
                dataType: "json",
                success: function(data) {
                    var zone = data.result.permission_zone.split(',');
                    $('#file_name').val(data.result.filename);
                    for(var i = 0;i < zone.length;i++){
                        if($('#input_zone'+''+zone[i]+'').val() == zone[i]){
                             $('#input_zone'+''+zone[i]+'').attr('checked','checked');
                        }
                         
                    }
                    
                    $('#file_popup').modal('show');
                },
                error: function(XMLHttpRequest) {
                    //$.growl(XMLHttpRequest.status, {type: 'danger'}); //danger , info , warning
                }
            });


        }
    </script>
</div>