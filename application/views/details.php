<?php 
$settinginfo=$this->settinginfo;
?>
<?php if($isfound!=2){ ?>
<?php $checkindate=$this->session->userdata('checkin');
$checkoutdate=$this->session->userdata('checkout');
if(empty($checkoutdate)||($checkoutdate<=$checkindate))
$checkoutdate=date('Y-m-d', strtotime($checkindate. ' + 1 days'));
$adult=$this->session->userdata('adults');
if($checkindate>=date('Y-m-d') && $checkoutdate>$checkindate){
$children=$this->session->userdata('children');
$checkin=date("l, M d Y", strtotime($checkindate));
$checkout=date("l, M d Y", strtotime($checkoutdate));
?>
<?php
$allroomno=explode(',',$freeroom);
$num = count($allroomno);
$t_room=ceil($adult/$roominfo->capacity);
?>
<?php if($num>=$t_room){ ?>
<div class="section bg-white">
    <div class="container">
        <div class="alert alert-success text-center mb-5" role="alert">
            <?php echo display('awsome_choice') ?>
        </div>
        <div class="row">

            <div class="col-md-5 col-lg-4">
                <div class="card card-body rounded-0 mb-3 p-4">
                    <div class=""><?php echo display('check_in') ?></div>
                    <div class="fs-18 font-weight-600 text-dark"><?php echo html_escape($checkin);?></div>
                    <div class="fs-12 text-muted mb-4"><?php echo display('from') ?>
                        <?php echo html_escape($settinginfo->checkintime); ?></div>

                    <div class=""><?php echo display('check_out') ?></div>
                    <div class="fs-18 font-weight-600 text-dark"><?php echo html_escape($checkout);?></div>
                    <div class="fs-12 text-muted mb-4"><?php echo display('until') ?>
                        <?php echo html_escape($settinginfo->checkouttime); ?></div>
                    <?php 
							$datediff = strtotime($checkoutdate) - strtotime($checkindate);
                   $datediff = floor($datediff/(60*60*24));
				   if($datediff==0){
					 $datediff=$datediff+1;
                    }
					$totaldiscount=0;
                    $dis=0;
					$roomrate=0;
					$x=0;
					$total=0;
					for($i = 0; $i < $datediff; $i++){
					$alldays= date("Y-m-d", strtotime($checkindate . ' + ' . $i . 'day'));
					$x++;
					$getroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$roominfo->roomid)->where('offer_date',$alldays)->get()->row();
					if(!empty($getroom)){
                        for($j=0;$j<$t_room;$j++){
						$totaldiscount+=$getroom->offer;
                        }
						}
					$roomrate=$roominfo->rate;
					$price=$roomrate*$t_room;
					$total=$total+$price;
					}
                    $setting=$this->db->select("rate")->from("tbl_taxmgt")->where("isactive",1)->get()->result();
                    $taxamount=0;
                    foreach($setting as $st){
                        $taxamount+=($st->rate);
                    }
					$tax=$taxamount;
					 $servicecharge=$this->settinginfo->servicecharge;
					?>
                    <div class="price_details">
                        <ul class="list-unstyled">
                            <li class="list_item">
                                <span
                                    class="list_item_name font-weight-600 text-dark fs-15"><?php echo html_escape($roominfo->roomtype);?></span>
                                <span
                                    class="list_item_price"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?> <?php echo html_escape(number_format($total,2,'.',','));?> <?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span>
                            </li>
                            <li class="list_item">
                                <span
                                    class="list_item_name font-weight-600 text-dark fs-15"><?php echo display('adults') ?></span>
                                <span class="list_item_price"><?php echo html_escape($adult);?>
                                    <?php echo display('person') ?></span>
                            </li>
                            <li class="list_item">
                                <span
                                    class="list_item_name font-weight-600 text-dark fs-15"><?php echo display('roomsize') ?></span>
                                <span class="list_item_price"><?php echo html_escape($roominfo->capacity);?>
                                    <?php echo display('person') ?></span>
                            </li>
                            <li class="list_item">
                                <span
                                    class="list_item_name font-weight-600 text-dark fs-15"><?php echo display('num_of_room') ?></span>
                                <span class="list_item_price"><?php echo html_escape($t_room);?></span>
                            </li>
                            <li class="list_item">
                                <span
                                    class="list_item_name font-weight-600 text-dark fs-15"><?php echo html_escape($tax);?>
                                    % <?php echo display('tax') ?></span>
                                <span class="list_item_price">
    <?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?>
    <?php $taxamount = (($total-$totaldiscount)*$tax)/100; echo html_escape(number_format($taxamount,2,'.',',')); ?>
    <?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?>
</span>

                            </li>`
                            <li class="list_item">
                                <span
                                    class="list_item_name font-weight-600 text-dark fs-15"><?php echo html_escape($servicecharge);?>
                                    % <?php echo display('service_charge') ?></span>
                                <span class="list_item_price">
    <?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?>
    <?php $serviceamnt = (($total-$totaldiscount)*$servicecharge)/100; echo html_escape(number_format($serviceamnt,2,'.',',')); ?>
    <?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?>
</span>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group row justify-content-around">
                        <input type="hidden" value="<?php echo $this->storecurrency->position; ?>"
                            id="currency_possition">
                        <input type="hidden" value="<?php echo $this->storecurrency->curr_icon; ?>" id="currency_icon">
                        <input type="hidden" value="<?php echo $settinginfo->pricetxt; ?>" id="pricetext">
                        <input type="hidden" value="<?php echo html_escape($roominfo->roomid);?>" id="roomid">
                        <input type="hidden"
                            value="<?php if($totaldiscount>0){?><?php  $dis=$totaldiscount; echo $dis; ?><?php } ?>"
                            id="total_discount">
                        <input type="hidden"
                            value="<?php echo html_escape((!empty($dis)?(round($total+$taxamount+$serviceamnt))-$dis:(round($total+$taxamount+$serviceamnt)))); ?>"
                            id="total_amount">
                        <input name="promo_code" placeholder="<?php echo display('promo_code') ?>"
                            class="col-sm-6 border_color" id="promo_code">
                        <button type="button" class="btn btn-primary"
                            onclick="promo_code()"><?php echo display("apply_code") ?></button>
                    </div>
                    <div class="price_callout" id="promocodeinfo">
                        <div class="list_item mb-3">
                            <span
                                class="list_item_name font-weight-600 text-dark"><?php echo display('total_price') ?></span>
                            <div class="list_item_price">
                                <span class="rack-price text-danger">
                                    <?php if($totaldiscount>0){?><s><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php  $dis=$totaldiscount; echo html_escape(number_format($dis,2,'.',',')); ?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></s><?php } ?>
                                </span>
                                <span class="discount-price text-success fs-21 font-weight-600" data-toggle="popover"
                                    data-html="true" data-placement="top"
                                    data-content="<p class='mb-0'><?php echo  html_escape($settinginfo->pricetxt); ?></p>">
                                    <?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo html_escape((!empty($dis)?($total+$taxamount+$serviceamnt)-$dis:number_format(round(($total+$taxamount+$serviceamnt)), 2, '.', ','))); ?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?>
                                    * <i class="fas fa-info-circle fs-14"></i></span>
                                <!-- /.End of popover -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach($condition as $booking_condition){ ?>
                <div class="media contact-service mb-3 p-4">
                    <div class="card-icon mr-3">
                        <img src="<?php echo base_url().html_escape(!empty($booking_condition->image)?$booking_condition->image:'assets/img/Home-page/save_line_all.png');?>"
                            alt="" class="img-fluid">
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0"><?php echo html_escape($booking_condition->title);?></h4>
                        <div><?php echo html_escape($booking_condition->subtitle);?></div>
                    </div>
                </div>
                <!-- /.End of contact service -->
                <?php } ?>
            </div>
            <div class="col-md-7 col-lg-8 mt-5 mt-md-0 pl-lg-5">
                <h3 class="custom-title position-relative font-weight-bold mb-4"><?php echo display('enter_details') ?>
                </h3>
                <?php if ($this->session->flashdata('exception')) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('exception') ?>
                </div>
                <?php } ?>
                <?php echo form_open('bookedroom'); ?>
                <input name="checkin" type="hidden" value="<?php echo html_escape($checkindate);?>" />
                <input name="checkout" type="hidden" value="<?php echo html_escape($checkoutdate);?>" />
                <input name="roomid" type="hidden" value="<?php echo html_escape($roominfo->roomid);?>" />
                <input name="roomtype" type="hidden" value="<?php echo html_escape($roominfo->roomtype);?>" />
                <input name="roomrate" type="hidden" value="<?php echo html_escape($roomrate);?>" />
                <input name="amount" type="hidden" value="<?php echo html_escape($total-$dis);?>" />
                <input name="discount" type="hidden" value="<?php echo html_escape($dis);?>" />
                <input name="tax" type="hidden" value="<?php echo html_escape($tax);?>" />
                <input name="servicetharge" type="hidden" value="<?php echo html_escape($servicecharge);?>" />

                <div class="row mb-4">
                    <div class="col-md-6 form-group">
                        <label for="f_name" class="font-weight-600 text-dark"><?php echo display('firstname') ?> <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="f_name" name="f_name"
                            value="<?php if($this->session->userdata('UserID')== TRUE){ echo html_escape($userinfo->firstname);}?>"
                            autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="l_name" class="font-weight-600 text-dark"><?php echo display('lastname') ?> <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="l_name" name="l_name"
                            value="<?php if($this->session->userdata('UserID')== TRUE){ echo html_escape($userinfo->lastname);}?>"
                            autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group" hidden>
                        <label for="nuofpeople"
                            class="font-weight-600 text-dark"><?php echo display('nuofpeople') ?></label>
                        <input type="text" class="form-control" id="nuofpeople" name="adult"
                            value="<?php echo html_escape($adult); ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group" hidden>
                        <label for="children"
                            class="font-weight-600 text-dark"><?php echo display('children') ?></label>
                        <input type="text" class="form-control" id="children" name="children"
                            value="<?php echo html_escape($children); ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group" hidden>
                        <label for="t_room" class="font-weight-600 text-dark"><?php echo display('room') ?></label>
                        <input type="text" class="form-control" id="t_room" name="t_room"
                            value="<?php echo html_escape($t_room); ?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email" class="font-weight-600 text-dark"><?php echo display('email') ?> <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php if($this->session->userdata('UserID')== TRUE){ echo html_escape($userinfo->email);}?>"
                            autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="phone" class="font-weight-600 text-dark"><?php echo display('phone') ?> <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="phone" name="phone"
                            value="<?php if($this->session->userdata('UserID')== TRUE){ echo html_escape($userinfo->cust_phone);}?>"
                            autocomplete="off" required>
                        <small class="form-text text-muted"><?php echo display('phone_message') ?></small>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="address" class="font-weight-600 text-dark"><?php echo display('address') ?> <span
                                class="text-danger"></span></label>
                        <textarea type="text" palaceholder="Address" class="form-control" id="address" name="address"
                            value="<?php if($this->session->userdata('UserID')== TRUE){ echo html_escape($userinfo->address);}?>"
                            rows="2" autocomplete="off"></textarea>
                    </div>
                    <?php if($this->session->userdata('UserID')== FALSE){?>
                    <div class="col-md-6 form-group padding_left_details" data-toggle="collapse"
                        data-target="#account-pass">
                        <input type="checkbox" class="custom-control-input " id="customCheck1" name="isaccount">
                        <label class="custom-control-label test-label"
                            for="customCheck1"><?php echo display('create_an_account') ?></label>
                    </div>
                    <div class="col-md-6 form-group collapse" id="account-pass">
                        <label class="font-weight-600 text-dark"
                            for="ac_pass"><?php echo display('create_account_password') ?></label>
                        <input type="password" class="form-control" id="ac_pass" name="password">
                    </div>
                    <?php } ?>

                </div>

                <h5 class="mb-3"><?php echo display('room') ?></h5>
                <div class="card card-body mb-4">
                    <div class="media ">
                        <img src="<?php echo base_url();?><?php echo html_escape(!empty($roominfo->room_imagename)?$roominfo->room_imagename:'assets/img/room_search.png');?>"
                            class="mr-3 width_238" alt="...">
                        <div class="media-body">
                            <h5 class="mb-0 fs-18"><?php echo html_escape($roominfo->roomtype);?></h5>
                            <p><?php echo html_escape($roominfo->roomdescription);?></p>
                            <?php
                                    $facilityinfo=$this->db->select("roomfacilitydetails.facilitytitle,roomfaility_ref_accomodation.*")->from('roomfaility_ref_accomodation')->join('roomfacilitydetails','roomfacilitydetails.facilityid=roomfaility_ref_accomodation.facilityid','left')->where('roomfaility_ref_accomodation.room_id',$roominfo->roomid)->get()->result();
                                    ?>

                            <h5 class="mb-0 fs-18"><?php echo display('your_stay_includes') ?></h5>
                            <p>
                                <?php foreach($facilityinfo as $facility){?>
                                <?php echo html_escape($facility->facilitytitle);?>
                                <?php } ?>
                            </p>

                            <a href="#" class="terms-conditions text-success font-weight-600 pl-0" data-toggle="modal"
                                data-target="#conditionsModal1">
                                <?php echo display('booking_conditions') ?> <i class="fas fa-crop-alt"></i></a>
                            <?php $bookingcondition=$this->db->select('*')->from('tbl_widget')->where('widgetid',2)->get()->row();?>
                            <!-- Modal -->
                            <div class="modal" id="conditionsModal1" tabindex="-1" role="dialog"
                                aria-labelledby="conditionsModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="conditionsModalLabel1">
                                                <?php echo html_escape($bookingcondition->widget_title);?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                                    $condition = $this->db->select('*')->from('tbl_widget')->where('widgetid',35)->get()->row();
                                                    $condition1 = $this->db->select('*')->from('tbl_widget')->where('widgetid',36)->get()->row();
                                                    $condition2 = $this->db->select('*')->from('tbl_widget')->where('widgetid',37)->get()->row();
                                                ?>
                                        <div class="modal-body width-450px">
                                            <h6 class="font-weight-bold">
                                                <?php echo html_escape($condition->widget_title) ?></h6>
                                            <p><?php echo html_escape($condition->widget_desc) ?></p>
                                            <h6 class="font-weight-bold">
                                                <?php echo html_escape($condition1->widget_title) ?></h6>
                                            <p><?php echo html_escape($condition1->widget_desc) ?></p>
                                            <h6 class="font-weight-bold">
                                                <?php echo html_escape($condition2->widget_title) ?></h6>
                                            <p class="mb-0"><?php echo html_escape($condition2->widget_desc) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-8">
                        <label for="guest"
                            class="text-dark font-weight-600"><?php echo display('full_guest_name') ?></label>
                        <input type="text" class="form-control" id="guest" name="guest">
                    </div>
                </div>
                <h5 class="mb-0"><?php echo display('special_request') ?></h5>
                <p><?php echo display('write_request') ?></p>

                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                        name="specialinstruction"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo display('next_final_details') ?></button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
<br />
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center"><?php echo html_escape($roominfo->roomtype);?>
                <?php echo display('is_not_available') ?> <?php echo html_escape($adult);?>
                <?php echo display('people') ?>, <?php echo display('available_room') ?> <?php echo html_escape($num);?>
            </h2>
        </div>
    </div>
</div>
<br />
<?php } ?>
<?php }else{ ?>
<br />
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center"><?php echo html_escape($roominfo->roomtype);?>
                <?php echo display('is_not_available_on_this_date') ?></h2>
        </div>
    </div>
</div>
<br />
<?php } ?>
<?php }else{ ?>
<br />
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center"><?php echo html_escape($roominfo->roomtype);?>
                <?php echo display('is_not_available_on_this_date') ?></h2>
        </div>
    </div>
</div>
<br />
<?php } ?>
<script src="<?php echo base_url();?>website_assets/js/promocode.js"></script>