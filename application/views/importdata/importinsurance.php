<div class="col-lg-12">
    <div class="col-xs-12" >
        <div class="panel panel-default" >
            <div class="panel-heading">
                <h3 class="panel-title">นำเข้าข้อประกัน</h3>
            </div>
            <div class="panel-body">
                <?php if ($result == 'success'): ?>
                    <div class="col-xs-12" >
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="alert-link">นำเข้าข้อมูลเรียบร้อย</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <form action="" class="form-inline" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <input type="file"  class="form-control" name="userfile"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <input type="submit" name="submit"  class="btn btn-default"  value="นำเข้าข้อมูล" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>