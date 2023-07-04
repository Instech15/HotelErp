<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">
<?php
$status = array(
    '' => 'Select Status',
    '1' => 'Available',
    '2' => 'Booked',
    '3' => 'Assigned to clean',
    '4' => 'Booked',
    '5' => 'Under maintenance',
    '6' => 'Dirty',
    '7' => 'Blocked',
    '8' => 'Do not reserve',
    '9' => 'Under Process',
);
?>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <?php if($this->permission->method('room_reservation','create')->access()): ?>
            <div class="card-header">
                <h4><?php echo display('room_status')?></h4>
            </div>
            <div class="row">
                <!--  table area -->
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" class="datatable table table-striped table-bordered table-hover"
                                id="exdatatable">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th><?php echo display('room_no') ?></th>
                                        <th><?php echo display('floor_name') ?></th>
                                        <th><?php echo display('room_name') ?></th>
                                        <th><?php echo display('room_status') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                             <?php if (!empty($roomlist)) {
                            ?>
                             <?php $sl = 1; ?>
                             <?php foreach ($roomlist as $list) { ?>
                               <?php 
                                    $room_type = $this->db->select("roomtype")->from("roomdetails")->where("roomid", $list->roomid)->get()->row();
                                    $floor = $this->db->select("floorname")->from("tbl_floor")->where("floorid", $list->floorid)->get()->row();
                                ?> 
                             <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                 <td><?php echo $sl; ?></td>
                                 <td><?php echo html_escape($list->roomno); ?></td>
                                 <td><?php echo html_escape($floor->floorname); ?></td>
                                 <td><?php echo html_escape($room_type->roomtype); ?></td>
                                 <td><?php echo html_escape($status[$list->status]); ?>
                                 <?php 
                                    if($list->status==2 | $list->status==4){
                                        $time = $this->db->select("checkoutdate")->from("booked_info")->where("checkindate<=",date("Y-m-d H:i:s"))->where("checkoutdate>=",date("Y-m-d H:i:s"))->where("FIND_IN_SET(".$list->roomno.",room_no)<>",0)->where_in("bookingstatus",array(0,4))->get()->row();
                                        if(!empty($time->checkoutdate)){
                                        $diff = strtotime($time->checkoutdate) - strtotime(date("Y-m-d H:i:s"));
                                        $dur = $time->checkoutdate;
                                        echo " "; ?>
                                        <span id="time_<?php echo $sl; ?>"></span>
                                        <input type="hidden" value="<?php echo $dur; ?>" id="<?php echo $sl; ?>" class='sl'  >
                                        <?php 
                                      }
                                    }
                                    ?>
                                </td>
                             </tr>
                             <?php $sl++; ?>
                             <?php } ?>
                             <?php } ?>
                         </tbody>
                            </table> <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/timer.js"></script>