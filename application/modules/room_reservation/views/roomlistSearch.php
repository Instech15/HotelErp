<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/roomlist.css">

<?php
$status = array(
    '' => 'Select Status',
    '0' => 'Checkin',
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

<?php $sl = 1; ?>
<?php foreach ($roomlist as $list) { ?>
<?php 
    if(empty($list->date)){
        $list->date = date("Y-m-d");
    }
    $room_type = $this->db->select("roomtype")->from("roomdetails")->where("roomid", $list->roomid)->get()->row();
    $room_image = $this->db->select("room_imagename")->from("room_image")->where("room_id", $list->roomid)->get()->row();
    $floor = $this->db->select("floorname")->from("tbl_floor")->where("floorid", $list->floorid)->get()->row();
?>
<?php 
    $id = $this->db->select("bookedid,bookingstatus")->from("booked_info")->where("date(checkindate)<=",$list->date)->where("date(checkoutdate)>=",$list->date)->where("FIND_IN_SET(".$list->roomno.",room_no)<>",0)->where_in("bookingstatus",array(0,4))->get()->row();
    if(!empty($id)?$id->bookingstatus==4:""){
        $list->status = 0;
    }
    ?>
<div class="col-sm-6 col-lg-4 col-xl-3 col-xxl-2 mb-3">
    <div class="position-relative d-flex justify-content-center">
        <div class="hotel-image">
            <img src="<?php echo base_url((!empty($room_image))?$room_image->room_imagename:"assets/img/room-setting/room_images.png"); ?>"
                class="image-inner" alt="">
        </div>
        <div
            class="overlay-<?php if($list->status==2 | $list->status==4){echo "green";} if($list->status==1){echo "black";} if($list->status==0){echo "red";}?> px-4 py-3 text-center text-white position-absolute">
            <h2 class="fs-21 mt-3 font-weight-bold">
                <?php echo display('floor_name')." "; echo html_escape($floor->floorname); ?></h2>
            <h3 class="fs-21 mt-3 font-weight-bold">
                <?php echo display('room_no')." "; echo html_escape($list->roomno); ?></h3>
            <p class="mb-1">
                <?php echo display('room_name')." :"; echo html_escape($room_type->roomtype); ?></p>
            <?php
                            if($list->status==2 | $list->status==4 | $list->status==0){
                                    $time = $this->db->select("checkoutdate")->from("booked_info")->where("date(checkindate)<=",$list->date)->where("date(checkoutdate)>=",$list->date)->where("FIND_IN_SET(".$list->roomno.",room_no)<>",0)->where_in("bookingstatus",array(0,4))->get()->row();
                                    if(!empty($time->checkoutdate)){
                                    $diff = strtotime($time->checkoutdate) - strtotime($list->date);
                                    $dur = $time->checkoutdate;
                                    echo " "; ?>
            <p class="mb-1">
                <?php echo display('checkout')." :"; echo html_escape(date("Y-m-d",strtotime($time->checkoutdate))); ?>
            </p>
            <p class="mb-1 countdown-text" id="time_<?php echo $sl; ?>"></p>
            <input type="hidden" value="<?php echo $dur; ?>" id="<?php echo $sl; ?>" class='sl'>
            <?php 
                                      }
                                    }else{ ?>
            <p class="mb-1"><?php echo display('checkout')." : None";  ?></p>
            <p class="mb-1 countdown-text">0.0</p>
            <?php }
                                    ?>
            <input type="hidden" id="date_time" value="<?php echo $list->date; ?>">
            <button type="button"
                class="btn btn-<?php if($list->status==2 | $list->status==4){echo "primary";} if($list->status==1){echo "success";} if($list->status==0){echo "warning";}?> mb-2 font-weight-bold"
                id="<?php echo empty($id)?"":"b_".$id->bookedid; ?>" value="<?php echo $list->roomno; ?>" data-toggle="modal"
                onclick="Detail(<?php echo empty($id)?0:$id->bookedid; ?>,<?php echo $list->roomno; ?>)" data-target="#exampleModal1"><?php echo html_escape($status[$list->status]); ?></button>
        </div>
    </div>
</div>
<?php $sl++; ?>
<?php } ?>
<script src="<?php echo MOD_URL.$module;?>/assets/js/timer.js"></script>