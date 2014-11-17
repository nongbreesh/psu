<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript"
        src="<?php echo base_url('public') ?>/js/jquery-1.7.2.min.js"></script>
        <link href="<?php echo base_url('public') ?>/css/bootstrap.css" rel="stylesheet"
              type="text/css" />
        <link href="<?php echo base_url('public') ?>/css/style.css" rel="stylesheet"
              type="text/css" />
        <script type="text/javascript" src="<?php echo base_url('public') ?>/js/bootstrap.js" rel="stylesheet"></script>
    </head>
    <body>

        <div class="containner">
            <div class="col-xs-12 topheader">
                <div class="col-xs-6 pull-right" style="float: right;">
                    <label>สวัสดีคุณ <?php echo $user['user_fullname'] ?> 
                        <?php if ($user['user_empid'] != 0): ?>
                            <a href="<?php echo base_url('member') ?>/member_insurance/<?php echo $user['user_empid'] ?>">[ดูข้อมูลส่วนตัว]</a>
                        <?php endif; ?>
                        <a href="<?php echo base_url(); ?>logout">[ออกจากระบบ]</a></label>
                </div>
            </div>
            <div class="col-xs-12 header">

                <div class="col-xs-12 menu">

                    <div class="col-xs-2 box first <?php echo $menu == 'home' ? 'active' : '' ?>">
                        <a class="menu" href="<?php echo base_url(); ?>"></a>
                        <span class="glyphicon glyphicon-stats"></span>
                        <p>ข้อมูลหลัก</p>
                    </div>
                    <div class="col-xs-3 box <?php echo $menu == 'member' ? 'active' : '' ?>">
                        <?php if ($user['isview'] == 1 && $user['isedit'] == 0): ?>
                            <a class="menu" href="<?php echo base_url('member') ?>/member_insurance/<?php echo $user['user_empid'] ?>"></a>
                        <?php else: ?>
                            <a class="menu" href="<?php echo base_url(); ?>member"></a>
                        <?php endif; ?>
                        <span class="glyphicon glyphicon-user"></span>
                        <p>ข้อมูลสมาชิก</p>
                        <?php if ($user['isadmin'] == 1): ?>
                            <div class="submenu" style="width: 350px;">
                                <ul>
                                    <?php if ($user['issuperuser'] == 1): ?>
                                        <li>  <a class="" href="<?php echo base_url(); ?>member/memberline">แสดงข้อมูลสมาชิกในสังกัด</a></li>
                                    <?php endif; ?>
                                    <?php if ($user['isadmin'] == 1): ?>
                                        <li>  <a class="" href="<?php echo base_url(); ?>member/downloadfile">download เอกสาร </a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-2 box">
                        <a class="menu" href="#"></a>
                        <span class="glyphicon glyphicon-signal"></span>
                        <p>รายงาน</p>
                    </div>
                    <div class="col-xs-3 box">
                        <a class="menu" href="#"></a>
                        <span class="glyphicon glyphicon-usd"></span>
                        <p>ข้อมูลการชำระเงิน</p>
                    </div>
                    <?php if ($user['isadmin'] == 1): ?>
                        <div class="col-xs-2 box last <?php echo $menu == 'setting' ? 'active' : '' ?>">
                            <a class="menu" href="#"></a>
                            <span class="glyphicon glyphicon-wrench"></span>
                            <p>ระบบการจัดการ</p>
                            <div class="submenu" style="width:  290px;">
                                <ul>
                                    <li>  <a class="" href="<?php echo base_url(); ?>setting/filepermissionsetting">ระบบจัดการเอกสาร</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>setting/memberpermissionsetting">ระบบจัดการสิทธิ</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>setting/grouppermissionsetting">ระบบจัดการสิทธิ์ตามภาค</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>setting/filemanage">นำเข้าข้อมูลพนักงาน </a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importmember">นำเข้าข้อมูลสมาชิก </a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importins1">นำเข้าข้อมูลประกัน กลุ่มผู้บริหาร</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importins2">นำเข้าข้อมูลประกัน กลุ่มภาคเหนือ</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importins3">นำเข้าข้อมูลประกัน กลุ่มภาคอีสาน</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importins4">นำเข้าข้อมูลประกัน กลุ่มภาคกลาง-ออก</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importins5">นำเข้าข้อมูลประกัน กลุ่มภาคใต้-ตก</a></li>
                                    <li>  <a class="" href="<?php echo base_url(); ?>importdata/importins6">นำเข้าข้อมูลประกัน กลุ่มสำนักงานใหญ่</a></li>
                                </ul>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-xs-2 box last">
                            <a class="menu" href="<?php echo base_url(); ?>member/downloadfile"></a>
                            <span class="glyphicon glyphicon-wrench"></span>
                            <p>download เอกสาร</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- END HEADER -->

            <div class="container-fluid body">
                <?php $this->load->view($view); ?>
            </div>

            <footer>
                <p class="col-md-7">
                    <strong>© THAIWEBDEVELOP 2014</strong>. All right s reserved. <br>
                    Designed by Piyojangz
                </p>
                <p class="col-md-5">
                    <a href="#">PRIVACY POLICY</a> | <a href="#">TERMS &amp; CONDITIONS</a>
                    | <a href="#">SITE MAP</a>
                </p>
            </footer>
        </div>


    </body>

</html>
