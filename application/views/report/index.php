<div class="col-xs-12">
    <?php if (!empty($result)): ?>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">อัพเดทข้อมูลเรียบร้อย</div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="panel col-sm-12 " >
        <div class="panel-heading">
            <h3 class="panel-title">ออกรายงาน</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-4">
                <button type="button" onclick="getnewmemberreport()" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-print"></span> สมาชิกใหม่</button>
            </div>
            <div class="col-sm-4">
                <button type="button" onclick="getexpiredmemberreport()" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>สมาชิกพ้นสภาพ</button>
            </div>
            <div class="col-sm-4">
                <button type="button" onclick="getmemberreport()" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-print"></span> ข้อมูลสมาชิก</button>
            </div>
        </div>
    </div>
</div>
<script>
    function getnewmemberreport() {
        location.href = '<?php echo base_url() ?>report/getnewmemberreport';
    }
    function getexpiredmemberreport() {
        location.href = '<?php echo base_url() ?>report/getexpiredmemberreport';
    }
    function getmemberreport() {
        location.href = '<?php echo base_url() ?>report/getmemberreport';
    }

</script>