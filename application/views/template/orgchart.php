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
        <link href="<?php echo base_url('public') ?>/css/orgchart.css" rel="stylesheet"
              type="text/css" />
        <script type="text/javascript" src="<?php echo base_url('public') ?>/js/bootstrap.js" rel="stylesheet"></script>
    </head>
    <body>
        <div class="containner">
            <div class="col-xs-12 header">
                <div class="col-xs-2 logo">
                    <div class="row">
                        <img src="<?php echo base_url('public') ?>/img/logo.png" width="80" />
                        <p>ระบบจัดการข้อมูลสมาชิก</p>
                    </div>
                </div>
                <div class="col-xs-10 menu">
                    <div class="col-xs-2 box first active">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        <p>ข้อมูลหลัก</p>
                    </div>
                    <div class="col-xs-3 box">
                        <a class="menu" href="#"></a>
                        <span class="glyphicon glyphicon-user"></span>
                        <p>ข้อมูลสมาชิก</p>
                        <div class="submenu" style="width: 350px;">
                            <ul>
                                <li>  <a class="" href="#">แสดงรายงานข้อมูลของสมาชิก ในแต่ละเดือน</a></li>
                                <li>  <a class="" href="#">แสดงผังข้อมูลสมาชิกในสังกัด</a></li>
                                <li>  <a class="" href="#">download เอกสารตาม </a></li>
                            </ul>
                        </div>
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

                    <div class="col-xs-2 box last">
                        <a class="menu" href="#"></a>
                        <span class="glyphicon glyphicon-wrench"></span>
                        <p>ระบบการจัดการ</p>
                        <div class="submenu">
                            <ul>
                                <li>  <a class="" href="#">ระบบจัดการสิทธิ์การเข้าดูเอกสาร</a></li>
                                <li>  <a class="" href="#">ระบบจัดการเอกสาร</a></li>
                                <li>  <a class="" href="#">ระบบจัดการสมาชิก </a></li></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END HEADER -->
            <div>
                <div class="col-xs-12 body">
                    <div class="col-xs-12 breadcrumb clearfix">หน้าหลัก > แสดงแผนผังของสมาชิก</div>
                    <div class="col-xs-12 orgchart">
                        <div style="width:600px; margin: 0 auto;">
                            <div class="tree">
                                <ul>
                                    <li>
                                        <a href="#">ประธานอนุ<br/>วีระยุทธ ตะสูงเนิน</a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    นายทะเบียน<br/>xxxxxxxxxxx</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">IT Administrator <br/>Ericson Ginting<br/>Assistant Manager</a>

                                                        <ul>
                                                            <li>
                                                                <a href="#">IT Engineer <br/>I Wayan Purushottama<br/>Engineer</a>

                                                                <ul>
                                                                    <li>
                                                                        <a href="#">IT Support<br/>Juanda F Butar Butar<br/>Assistant Engineer</a>
                                                                    </li>
                                                                </ul>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="just-line"><br/><br/><br/></a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">IT Support<br/>David Alwis<br/>Assistant Engineer</a>

                                                                        <ul>
                                                                            <li>
                                                                                <a href="#">IT Support<br/>Nico Simanjuntak<br/>Technician</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    เลขาฯ<br/>นาง นิตยา ชลายนเดชะ</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    เหรัญญิก<br/>นาง ธนิดา เจนจิตติกุล</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
