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
<div class="row">
    <?php if($this->permission->method('room_reservation','create')->access()): ?>
    <div class="col-sm-12 col-md-12">
        <div class="card mb-4 flex-fill w-100">
            <!--Content Header (Page header)-->
            <div class="card-header">
                <div class="content-header row align-items-center g-0">
                    <div class="col-lg-12 col-xl-4 mb-3 header-title">
                        <div class="d-flex align-items-center justify-content-center justify-content-xl-start">
                            <h1 class="font-weight-bolder">Room status</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb" class="col-md-12 col-lg-8 col-xl-5 mb-3 d-flex justify-content-center">
                        <div class="mr-2">
                            <input class="form-control datepickers" id="search_date" placeholder="Search Date"
                                type="text" value="" />
                        </div>

                        <div class="mr-2 d-flex">
                            <select name="somename" class="basic-single" id="search_status">
                                <option selected="selected" value="null"><?php echo display("search")." ".display("status") ?></option>
                                <option value="4"><?php echo display("checkin") ?></option>
                                <option value="0"><?php echo display("booked") ?></option>
                                <option value="1"><?php echo display("available") ?></option>
                            </select>
                        </div>

                        <div class="mr-2 d-flex">
                            <select name="somename" class="basic-single" id="search_apt">
                                <option selected="selected"  value="null"><?php echo display('floor_name') ?></option>
                                <?php foreach($floordetails as $btype){ ?>
                                <option value="<?php echo html_escape($btype->floorid); ?>">
                                    <?php echo html_escape($btype->floorname);?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mr-2">
                            <button type="button"
                                onclick="showResult(null,$('#search_date').val(),$('#search_status').find(':selected').val(),$('#search_apt').find(':selected').val())"
                                class="btn btn-success" id="search">Search</button>
                        </div>
                    </nav>
                    <div class="col-md-12 col-lg-4 mb-3 col-xl-3 header-title">
                        <form class="search" action="#" method="get">
                            <div class="search__inner">
                                <input type="text" style="padding-left:40px; height:40px"
                                    onkeyup="showResult(this.value)" class="search__text" placeholder="Search...">
                                <i class="typcn typcn-zoom-outline search__helper" data-sa-action="search-close"></i>
                            </div>
                        </form>
                        <!--/.search-->
                    </div>
                </div>
            </div>
            <!--/.Content Header (Page header)-->


            <div class="row p-3" id="allRooms">
                <?php $sl = 1; ?>
                <?php foreach ($roomlist as $list) { ?>
                <?php 
                        $room_type = $this->db->select("roomtype")->from("roomdetails")->where("roomid", $list->roomid)->get()->row();
                        $room_image = $this->db->select("room_imagename")->from("room_image")->where("room_id", $list->roomid)->get()->row();
                        $floor = $this->db->select("floorname")->from("tbl_floor")->where("floorid", $list->floorid)->get()->row();
                    ?>
                <?php 
                $id = $this->db->select("bookedid,bookingstatus")->from("booked_info")->where("checkindate<=",date("Y-m-d H:i:s"))->where("checkoutdate>=",date("Y-m-d H:i:s"))->where("FIND_IN_SET(".$list->roomno.",room_no)<>",0)->where_in("bookingstatus",array(0,4))->get()->row();
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
                            class="scroll-bar overlay-<?php if($list->status==2 | $list->status==4){echo "green";} if($list->status==1){echo "black";} if($list->status==0){echo "red";}?> px-4 py-3 text-center text-white position-absolute">
                            <h2 class="fs-21 mt-3 font-weight-bold">
                                <?php echo display('floor_name')." "; echo html_escape($floor->floorname); ?></h2>
                            <h3 class="fs-21 mt-3 font-weight-bold">
                                <?php echo display('room_no')." "; echo html_escape($list->roomno); ?></h3>
                            <p class="mb-1">
                                <?php echo display('room_name')." :"; echo html_escape($room_type->roomtype); ?></p>
                            <?php
                            if($list->status==2 | $list->status==4 | $list->status==0){
                                    $time = $this->db->select("checkoutdate")->from("booked_info")->where("checkindate<=",date("Y-m-d H:i:s"))->where("checkoutdate>=",date("Y-m-d H:i:s"))->where("FIND_IN_SET(".$list->roomno.",room_no)<>",0)->where_in("bookingstatus",array(0,4))->get()->row();
                                    if(!empty($time->checkoutdate)){
                                    $diff = strtotime($time->checkoutdate) - strtotime(date("Y-m-d H:i:s"));
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
                            <input type="hidden" id="date_time" value="<?php echo date("Y-m-d"); ?>">
                            <button type="button"
                                class="btn btn-<?php if($list->status==2 | $list->status==4){echo "primary";} if($list->status==1){echo "success";} if($list->status==0){echo "warning";}?> mb-2 font-weight-bold"
                                id="<?php echo empty($id)?"":"b_".$id->bookedid; ?>" value="<?php echo $list->roomno; ?>"
                                data-toggle="modal"
                                onclick="Detail(<?php echo empty($id)?0:$id->bookedid; ?>,<?php echo $list->roomno; ?>)"
                                data-target="#exampleModal1"><?php echo html_escape($status[$list->status]); ?></button>
                        </div>
                    </div>
                </div>
                <?php $sl++; ?>
                <?php } ?>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green text-white">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo display("room_no") ?> : <span
                            id="number"></span> </h5>
                    <button type="button" class="bg-green border-0 fs-23" data-dismiss="modal"><i
                            class="hvr-buzz-out fas fa-times text-white "></i></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3" id="list1">
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-building mr-2"></i><?php echo display("booking_status") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="status"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-user mr-2"></i></i><?php echo display("customer_name") ?> :</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="customer"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-phone-alt mr-2"></i><?php echo display("customer")." ".display("phone") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="phone"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-calendar-alt mr-2"></i><?php echo display("checkin") ?> :</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="checkin"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-calendar-alt mr-2"></i><?php echo display("checkout") ?> :</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="checkout"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-calendar-alt mr-2"></i><?php echo display("roomtype") ?> :</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="room_type"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-dollar-sign mr-2"></i><?php echo display("paid_amount") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="paid_amount"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-dollar-sign mr-2"></i><?php echo display("due_amount") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
    <p class="mb-0" id="due_amount"></p>
</div>

                            </div>
                            <?php $car_parking = $this->db->where('directory', 'car_parking')->where('status', 1)->get('module')->num_rows();
			                if ($car_parking == 1) { ?>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-car-side mr-2"></i><?php echo display("parking_status") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="pstatus"></p>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-map-marker-alt mr-2"></i><?php echo display("customer")." ".display("address") ?>
                                     :</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0 text-center" id="address"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" id="list2">
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-building mr-2"></i><?php echo display("booking_status") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="status1"><?php echo display("available") ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-list mr-2"></i><?php echo display("roomtype") ?> :</p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="roomType"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-dollar-sign mr-2"></i><?php echo display("rent_day") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="rpd"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-male mr-2"></i><?php echo display("adults") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="adults"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out far fa-user mr-2"></i></i><?php echo display("extra_capacity") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="extra"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="mb-0 p-2"><i class="hvr-buzz-out fas fa-star mr-2"></i><?php echo display("rating") ?> :
                                </p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="room-status">
                                    <p class="mb-0" id="rating"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9">
                            </div>
                            <div class="col-12 col-lg-3">
                                <input type="button" id="bookNow" class="btn btn-success mb-1 mt-2 font-weight-bold"
                                    value="Book Now">
                            </div>
                        </div>
                        <div class="row" id="list3">
                            <div class="col-12">
                                <p><i class="hvr-buzz-out far fa-file-alt mr-1"></i> <?php echo display("note") ?> </p>
                                <div class="d-flex mb-2">
                                    <input type="text" class="form-control w-50" id="problem_note"
                                        placeholder="Note a problem" value="">
                                    <input type="hidden" id="bookedid" value="">
                                    <input type="hidden" id="roomno" value="">
                                    <button type="button" class="border-0 bg-transparent pr-0" id="save_note">
                                        <i class="hvr-buzz-out fas fa-plus-square fs-30 mb-2 text-success"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <div class="row">
                                    <div class="card p-2 shadow-lg w-100">
                                        <div class="card-header p-0 mb-2 d-flex justify-content-between ">
                                            <p class="mb-0 font-weight-bold fs-16"><?php echo display("problem_list") ?></p>
                                        </div>

                                        <div class="problem-item scroll-bar" id="problem_list">
                                        </div>
                                    </div>
                                </div>
                                <div class="i-check m-0 d-flex justify-content-between align-items-center mt-1">
                                    <label class="mb-0" for="flat-checkbox-1"></label>
                                    <button type="button" class="btn btn-success" id="solved">
                                    <?php echo display("solved") ?>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card p-2 shadow-lg">
                                            <div class="card-header p-0 mb-2">
                                                <p class="mb-0 font-weight-bold fs-16"><?php echo display("solved")." ".display("list") ?></p>
                                            </div>
                                            <ol class="mb-0 problem-item scroll-bar" id="solved_list">
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- end modal -->
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/timer.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/roomlist.js"></script>