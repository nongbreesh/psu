<div class="col-lg-12"> 

    <div class="col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">จำนวนสมาชิกใหม่</h3>
            </div>
            <div class="panel-body">
                <form id="form_addfile" enctype="multipart/form-data" name="form_addfile"  method="post">

                    <div class="box-body">
                        <table class="table table-hover todo-list ">
                            <thead>
                                <tr>
                                    <th><strong>ภาค</strong></th>
                                    <th><strong>เดือน1</strong></th>
                                    <th><strong>เดือน2</strong></th>
                                    <th><strong>เดือน3</strong></th>
                                    <th><strong>เดือน4</strong></th>
                                    <th><strong>เดือน5</strong></th>
                                    <th><strong>เดือน6</strong></th>
                                    <th><strong>เดือน7</strong></th>
                                    <th><strong>เดือน8</strong></th>
                                    <th><strong>เดือน9</strong></th>
                                    <th><strong>เดือน10</strong></th>
                                    <th><strong>เดือน11</strong></th>
                                    <th><strong>เดือน12</strong></th>
                                    <th><strong>sum</strong></th>
                                </tr>
                            </thead>
                            <tbody id="cate_list">
                                <?php
                                $row1 = 0;
                                $row2 = 0;
                                $row3 = 0;
                                $row4 = 0;
                                $row5 = 0;
                                $row6 = 0;
                                $row7 = 0;
                                $row8 = 0;
                                $row9 = 0;
                                $row10 = 0;
                                $row11 = 0;
                                $row12 = 0;
                                $row1_1 = 0;
                                $row1_2 = 0;
                                $row1_3 = 0;
                                $row1_4 = 0;
                                $row1_5 = 0;
                                $row1_6 = 0;
                                $row1_7 = 0;
                                $row1_8 = 0;
                                $row1_9 = 0;
                                $row1_10 = 0;
                                $row1_11 = 0;
                                $row1_12 = 0;
                                foreach ($zone as $each):
                                    ?>
                                    <?php
                                    $sum = 0;
                                    $row1 = $method->getsummarybyzone($each->id, 1);
                                    $row2 = $method->getsummarybyzone($each->id, 2);
                                    $row3 = $method->getsummarybyzone($each->id, 3);
                                    $row4 = $method->getsummarybyzone($each->id, 4);
                                    $row5 = $method->getsummarybyzone($each->id, 5);
                                    $row6 = $method->getsummarybyzone($each->id, 6);
                                    $row7 = $method->getsummarybyzone($each->id, 7);
                                    $row8 = $method->getsummarybyzone($each->id, 8);
                                    $row9 = $method->getsummarybyzone($each->id, 9);
                                    $row10 = $method->getsummarybyzone($each->id, 10);
                                    $row11 = $method->getsummarybyzone($each->id, 11);
                                    $row12 = $method->getsummarybyzone($each->id, 12);

                                    $row1_1 += $row1;
                                    $row1_2 += $row2;
                                    $row1_3 += $row3;
                                    $row1_4 += $row4;
                                    $row1_5 += $row5;
                                    $row1_6 += $row6;
                                    $row1_7 += $row7;
                                    $row1_8 += $row8;
                                    $row1_9 += $row9;
                                    $row1_10 += $row10;
                                    $row1_11 += $row11;
                                    $row1_12 + $row12;
                                    $sum = $row1 + $row2 + $row3 + $row4 + $row5 + $row6 + $row7 + $row8 + $row9 + $row10 + $row11 + $row12;
                                    ?>
                                    <tr>
                                        <td><?php echo $each->name; ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 1); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 2); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 3); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 4); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 5); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 6); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 7); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 8); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 9); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 10); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 11); ?></td>
                                        <td><?php echo $method->getsummarybyzone($each->id, 12); ?></td>
                                        <td><b><u><?php echo $sum; ?></u></b></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>รวม</td>
                                    <td><b><u><?php echo $row1_1; ?></u></b></td>
                                    <td><b><u><?php echo $row1_2; ?></u></b></td>
                                    <td><b><u><?php echo $row1_3; ?></u></b></td>
                                    <td><b><u><?php echo $row1_4; ?></u></b></td>
                                    <td><b><u><?php echo $row1_5; ?></u></b></td>
                                    <td><b><u><?php echo $row1_6; ?></u></b></td>
                                    <td><b><u><?php echo $row1_7; ?></u></b></td>
                                    <td><b><u><?php echo $row1_8; ?></u></b></td>
                                    <td><b><u><?php echo $row1_9; ?></u></b></td>
                                    <td><b><u><?php echo $row1_10; ?></u></b></td>
                                    <td><b><u><?php echo $row1_11; ?></u></b></td>
                                    <td><b><u><?php echo $row1_12; ?></u></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">การพ้นสภาพจากการเป็นสมาชิก</h3>
            </div>
            <div class="panel-body">
                <form id="form_addfile" enctype="multipart/form-data" name="form_addfile"  method="post">

                    <div class="box-body">
                        <table class="table table-hover todo-list ">
                            <thead>
                                <tr>
                                    <th><strong>สถานะ</strong></th>
                                    <th><strong>เดือน1</strong></th>
                                    <th><strong>เดือน2</strong></th>
                                    <th><strong>เดือน3</strong></th>
                                    <th><strong>เดือน4</strong></th>
                                    <th><strong>เดือน5</strong></th>
                                    <th><strong>เดือน6</strong></th>
                                    <th><strong>เดือน7</strong></th>
                                    <th><strong>เดือน8</strong></th>
                                    <th><strong>เดือน9</strong></th>
                                    <th><strong>เดือน10</strong></th>
                                    <th><strong>เดือน11</strong></th>
                                    <th><strong>เดือน12</strong></th>
                                    <th><strong>sum</strong></th>
                                </tr>
                            </thead>
                            <tbody id="cate_list">
                                <?php
                                $row1 = 0;
                                $row2 = 0;
                                $row3 = 0;
                                $row4 = 0;
                                $row5 = 0;
                                $row6 = 0;
                                $row7 = 0;
                                $row8 = 0;
                                $row9 = 0;
                                $row10 = 0;
                                $row11 = 0;
                                $row12 = 0;
                                $row1_1 = 0;
                                $row1_2 = 0;
                                $row1_3 = 0;
                                $row1_4 = 0;
                                $row1_5 = 0;
                                $row1_6 = 0;
                                $row1_7 = 0;
                                $row1_8 = 0;
                                $row1_9 = 0;
                                $row1_10 = 0;
                                $row1_11 = 0;
                                $row1_12 = 0;
                                foreach ($empstatus as $each):
                                    ?>

                                    <?php if ($each->id != 0): ?>
                                        <?php
                                        $sum = 0;
                                        $row1 = $method->getsummarybystatus($each->id, 1);
                                        $row2 = $method->getsummarybystatus($each->id, 2);
                                        $row3 = $method->getsummarybystatus($each->id, 3);
                                        $row4 = $method->getsummarybystatus($each->id, 4);
                                        $row5 = $method->getsummarybystatus($each->id, 5);
                                        $row6 = $method->getsummarybystatus($each->id, 6);
                                        $row7 = $method->getsummarybystatus($each->id, 7);
                                        $row8 = $method->getsummarybystatus($each->id, 8);
                                        $row9 = $method->getsummarybystatus($each->id, 9);
                                        $row10 = $method->getsummarybystatus($each->id, 10);
                                        $row11 = $method->getsummarybystatus($each->id, 11);
                                        $row12 = $method->getsummarybystatus($each->id, 12);


                                        $row1_1 += $row1;
                                        $row1_2 += $row2;
                                        $row1_3 += $row3;
                                        $row1_4 += $row4;
                                        $row1_5 += $row5;
                                        $row1_6 += $row6;
                                        $row1_7 += $row7;
                                        $row1_8 += $row8;
                                        $row1_9 += $row9;
                                        $row1_10 += $row10;
                                        $row1_11 += $row11;
                                        $row1_12 + $row12;
                                        $sum = $row1 + $row2 + $row3 + $row4 + $row5 + $row6 + $row7 + $row8 + $row9 + $row10 + $row11 + $row12;
                                        ?>
                                        <tr>
                                            <td><?php echo $each->statusname; ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 1); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 2); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 3); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 4); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 5); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 6); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 7); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 8); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 9); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 10); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 11); ?></td>
                                            <td><?php echo $method->getsummarybystatus($each->id, 12); ?></td>
                                            <td><b><u><?php echo $sum; ?></u></b></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>รวม</td>
                                    <td><b><u><?php echo $row1_1; ?></u></b></td>
                                    <td><b><u><?php echo $row1_2; ?></u></b></td>
                                    <td><b><u><?php echo $row1_3; ?></u></b></td>
                                    <td><b><u><?php echo $row1_4; ?></u></b></td>
                                    <td><b><u><?php echo $row1_5; ?></u></b></td>
                                    <td><b><u><?php echo $row1_6; ?></u></b></td>
                                    <td><b><u><?php echo $row1_7; ?></u></b></td>
                                    <td><b><u><?php echo $row1_8; ?></u></b></td>
                                    <td><b><u><?php echo $row1_9; ?></u></b></td>
                                    <td><b><u><?php echo $row1_10; ?></u></b></td>
                                    <td><b><u><?php echo $row1_11; ?></u></b></td>
                                    <td><b><u><?php echo $row1_12; ?></u></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>


</div><!-- /.Left col -->