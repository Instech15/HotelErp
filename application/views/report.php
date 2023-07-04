<?php if($this->session->userdata('UserID')==true) { ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 text-center">

            <?php if($this->session->userdata('message')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo $this->session->userdata('message'); 
						 $this->session->unset_userdata('message');
						?>
            </div>
            <?php } ?>
            <?php if ($this->session->userdata('exception')) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo $this->session->userdata('exception');
						 $this->session->unset_userdata('exception');
						 ?>
            </div>
            <?php } ?>
            <?php if (validation_errors()) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?php echo validation_errors(); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card mb-4 mb-lg-0">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("user_profile") ?></h6>
                </div>

            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-3 col-sm-3 col-lg-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link color_black active" id="v-pills-home-tab" data-toggle="pill"
                            href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo display("booking_details") ?></a>
                        <a class="nav-link color_black" id="v-pills-profile-tab" data-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false"><?php echo display("profile") ?></a>
                        <a class="nav-link color_black" id="v-pills-messages-tab" data-toggle="pill"
                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false"><?php echo display("update_profile") ?></a>

                    </div>
                </div>
                <div class="col-7 col-sm-9 col-lg-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php if(!empty($bookings)){?>
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <?php } else{?>
                            <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <?php }?>
                                <h4 class="mb-3"><?php echo display("booking_details") ?></h4>
                                <?php if(!empty($bookings)){?>
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl_no') ?></th>
                                            <th><?php echo display('booking_number') ?></th>
                                            <th><?php echo display('room_name') ?></th>
                                            <th><?php echo display('check_in') ?></th>
                                            <th><?php echo display('check_out') ?></th>
                                            <th><?php echo display('booking_date') ?></th>
                                            <th><?php echo display('booking_status') ?></th>
                                            <th><?php echo display('payment_status') ?></th>
                                            <th><?php echo display('total_amount') ?></th>
                                            <th><?php echo display('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0;
                                  foreach($bookings as $book){
                                       $i++;
                                     ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo html_escape($book->booking_number);?></td>
                                            <td><?php echo html_escape($book->roomtype);?></td>
                                            <td><?php echo html_escape($book->checkindate);?></td>
                                            <td><?php echo html_escape($book->checkoutdate);?></td>
                                            <td><?php echo html_escape($book->date_time);?></td>
                                            <td><?php if($book->bookingstatus==0){echo display('pending');}if($book->bookingstatus==1){echo display('cancel');}if($book->bookingstatus==2){echo display('complete');}?>
                                            </td>
                                            <td><?php if($book->total_price>$book->paid_amount){echo display('pending');}else{echo display('complete');}?>
                                            </td>
                                            <td><?php echo html_escape($book->total_price);?></td>
                                            <td><a href="<?php echo base_url("hotel/details_report/".html_escape($book->bookedid)) ?>"
                                                    class="btn btn-success btn-sm" data-toggle="tooltip"
                                                    data-placement="top" data-original-title="Customer Invoice"
                                                    title="Customer Invoice"><i class="ti-receipt"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } 
			  else{?>
                                <span>
                                    <svg class="mb-4" height="150pt" viewBox="0 0 496 496" width="150pt"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m232 320h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                        <path
                                            d="m232 400h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                        <path
                                            d="m360 320h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                        <path
                                            d="m360 400h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                        <path d="m160 208h176v16h-176zm0 0" />
                                        <path d="m352 208h16v16h-16zm0 0" />
                                        <path d="m160 240h176v16h-176zm0 0" />
                                        <path d="m352 240h16v16h-16zm0 0" />
                                        <path d="m160 272h176v16h-176zm0 0" />
                                        <path d="m352 272h16v16h-16zm0 0" />
                                        <path d="m128 208h16v16h-16zm0 0" />
                                        <path d="m128 240h16v16h-16zm0 0" />
                                        <path d="m128 272h16v16h-16zm0 0" />
                                        <path
                                            d="m400 96c-26.472656 0-48 21.527344-48 48h16c0-17.648438 14.351562-32 32-32s32 14.351562 32 32h16c0-26.472656-21.527344-48-48-48zm0 0" />
                                        <path
                                            d="m372 72c6.617188 0 12-5.382812 12-12s-5.382812-12-12-12-12 5.382812-12 12 5.382812 12 12 12zm0-16c2.199219 0 4 1.792969 4 4s-1.800781 4-4 4-4-1.792969-4-4 1.800781-4 4-4zm0 0" />
                                        <path
                                            d="m428 72c6.617188 0 12-5.382812 12-12s-5.382812-12-12-12-12 5.382812-12 12 5.382812 12 12 12zm0-16c2.199219 0 4 1.792969 4 4s-1.800781 4-4 4-4-1.792969-4-4 1.800781-4 4-4zm0 0" />
                                        <path
                                            d="m400 0c-52.9375 0-96 43.0625-96 96 0 11.230469 2.039062 21.976562 5.601562 32h-123.203124c3.5625-10.023438 5.601562-20.769531 5.601562-32 0-52.9375-43.0625-96-96-96s-96 43.0625-96 96 43.0625 96 96 96v296c0 4.425781 3.574219 8 8 8h288c4.425781 0 8-3.574219 8-8v-296c52.9375 0 96-43.0625 96-96s-43.0625-96-96-96zm-128 144v16h-48v-16zm-256-48c0-44.113281 35.886719-80 80-80s80 35.886719 80 80-35.886719 80-80 80-80-35.886719-80-80zm368 384h-272v-289.449219c28.625-4.832031 52.945312-22.328125 67.007812-46.550781h28.992188v24c0 4.414062 3.574219 8 8 8h64c4.425781 0 8-3.585938 8-8v-24h28.992188c14.0625 24.230469 38.382812 41.71875 67.007812 46.550781zm16-304c-44.113281 0-80-35.886719-80-80s35.886719-80 80-80 80 35.886719 80 80-35.886719 80-80 80zm0 0" />
                                        <path
                                            d="m88 112h16c3.566406 0 6.710938-2.367188 7.695312-5.800781l16-56c1.058594-3.703125-.671874-7.632813-4.121093-9.351563l-8.839844-4.421875c-11.574219-5.785156-25.886719-5.785156-37.46875 0l-8.839844 4.414063c-3.449219 1.726562-5.179687 5.65625-4.121093 9.359375l16 56c.984374 3.433593 4.128906 5.800781 7.695312 5.800781zm-3.574219-61.265625c7.160157-3.574219 16-3.574219 23.160157 0l2.902343 1.457031-12.519531 43.808594h-3.9375l-12.511719-43.816406zm0 0" />
                                        <path
                                            d="m112 144c0 8.835938-7.164062 16-16 16s-16-7.164062-16-16 7.164062-16 16-16 16 7.164062 16 16zm0 0" />
                                    </svg><br />
                                    <?php echo display('no_result_found'); }
          ?>
                                </span>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <h4 class="mb-3"><?php echo display("profile_details") ?></h4>
                                <?php $userinfo=$this->db->select("*")->from('customerinfo')->where('customerid',$this->session->userdata('UserID'))->get()->row(); ?>
                                <div class="row">
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600"><?php echo display('account_name') ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <div class="">
                                                <?php echo html_escape($userinfo->firstname." ".$userinfo->lastname);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600"><?php echo display('email') ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <div class=""><?php echo html_escape($userinfo->email);?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600"><?php echo display('phone') ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <div class=""><?php echo html_escape($userinfo->cust_phone);?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 r-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600"><?php echo display('address') ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 r-md-1">
                                        <div class="form-group">
                                            <div class=""><?php echo html_escape($userinfo->address);?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <h4 class="mb-3"><?php echo display('customer_edit')?> </h4>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="card-body">
                                                <?php echo form_open('hotel/update_profile');?>
                                                <?php echo form_hidden('customerid', (!empty($intinfo->customerid)?$intinfo->customerid:null)) ?>
                                                <?php echo form_hidden('coahead', (!empty($customerhead)?$customerhead:null)) ?>
                                                <?php echo form_hidden('customernumber', (!empty($intinfo->customernumber)?$intinfo->customernumber:null)) ?>
                                                <div class="form-group row">
                                                    <label for="firstname"
                                                        class="col-sm-2 col-form-label"><?php echo display('firstname') ?>
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input name="firstname" autocomplete="off" class="form-control"
                                                            type="text" placeholder="<?php echo display('firstname') ?>"
                                                            id="firstname"
                                                            value="<?php echo html_escape((!empty($intinfo->firstname)?$intinfo->firstname:null)) ?>">
                                                    </div>
                                                    <label for="lastname"
                                                        class="col-sm-2 col-form-label"><?php echo display('lastname') ?>
                                                        <span class="text-danger">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input name="lastname" autocomplete="off" class="form-control"
                                                            type="text" placeholder="<?php echo display('lastname') ?>"
                                                            id="lastname"
                                                            value="<?php echo html_escape((!empty($intinfo->lastname)?$intinfo->lastname:null)) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email"
                                                        class="col-sm-2 col-form-label"><?php echo display('email') ?><span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input name="email" autocomplete="off" class="form-control"
                                                            type="text" placeholder="<?php echo display('email') ?>"
                                                            id="email"
                                                            value="<?php echo html_escape((!empty($intinfo->email)?$intinfo->email:null)) ?>">
                                                    </div>
                                                    <label for="phone"
                                                        class="col-sm-2 col-form-label"><?php echo display('phone') ?>
                                                        <span class="text-danger">*</span> </label>
                                                    <div class="col-sm-4">
                                                        <input name="phone" autocomplete="off" class="form-control"
                                                            type="number" placeholder="<?php echo display('phone') ?>"
                                                            id="phone"
                                                            value="<?php echo html_escape((!empty($intinfo->cust_phone)?$intinfo->cust_phone:null)) ?>">
                                                        <small
                                                            class="form-text text-muted"><?php echo display('phone_message') ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dob"
                                                        class="col-sm-2 col-form-label"><?php echo display('dob') ?></label>
                                                    <div class="col-sm-4">
                                                        <input name="dob" autocomplete="off"
                                                            class="datepickers form-control" type="text"
                                                            placeholder="<?php echo display('dob') ?>" id="dob"
                                                            value="<?php echo html_escape((!empty($intinfo->dob)?$intinfo->dob:null)) ?>">
                                                    </div>
                                                    <label for="profession"
                                                        class="col-sm-2 col-form-label"><?php echo display('profession') ?>
                                                    </label>
                                                    <div class="col-sm-4">
                                                        <input name="profession" autocomplete="off" class="form-control"
                                                            type="text"
                                                            placeholder="<?php echo display('profession') ?>"
                                                            id="profession"
                                                            value="<?php echo html_escape((!empty($intinfo->profession)?$intinfo->profession:null)) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone"
                                                        class="col-sm-2 col-form-label"><?php echo display('nationality') ?>
                                                    </label>
                                                    <div class="col-sm-4">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio"
                                                                <?php if($intinfo->isnationality=="native"){ echo "checked";}?>
                                                                class="form-check-input" name="nationaliti"
                                                                id="materialInline1" value="native">
                                                            <label class="form-check-label"
                                                                for="materialInline1"><?php echo display('native') ?></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input"
                                                                <?php if($intinfo->isnationality=="foreigner"){ echo "checked";}?>
                                                                name="nationaliti" id="materialInline2"
                                                                value="foreigner">
                                                            <label class="form-check-label"
                                                                for="materialInline2"><?php echo display('foreigner') ?></label>
                                                        </div>
                                                    </div>
                                                    <label for="national_id"
                                                        class="col-sm-2 col-form-label"><?php echo display('national_id') ?></label>
                                                    <div class="col-sm-4">
                                                        <input name="national_id" autocomplete="off"
                                                            class="form-control" type="number"
                                                            placeholder="<?php echo display('national_id') ?>"
                                                            id="national_id"
                                                            value="<?php echo html_escape((!empty($intinfo->nid)?$intinfo->nid:null)) ?>">
                                                    </div>
                                                </div>
                                                <span id="foreignerinfo"
                                                    style="display:<?php if($intinfo->isnationality=="foreigner"){ echo "block";}else{ echo "none";}?>;">
                                                    <div class="form-group row">
                                                        <label for="nationalitycon"
                                                            class="col-sm-2 col-form-label"><?php echo display('nationality') ?></label>
                                                        <div class="col-sm-4">
                                                            <input name="nationalitycon" autocomplete="off"
                                                                class="form-control" type="text"
                                                                placeholder="<?php echo display('nationality') ?>"
                                                                id="nationalitycon"
                                                                value="<?php echo html_escape((!empty($intinfo->nationality)?$intinfo->nationality:null)) ?>">
                                                        </div>
                                                        <label for="passport_no"
                                                            class="col-sm-2 col-form-label"><?php echo display('passport_no') ?>
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <input name="passport_no" autocomplete="off"
                                                                class="form-control" type="text"
                                                                placeholder="<?php echo display('passport_no') ?>"
                                                                id="passport_no"
                                                                value="<?php echo html_escape((!empty($intinfo->passport)?$intinfo->passport:null)) ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="visa_reg_no"
                                                            class="col-sm-2 col-form-label"><?php echo display('visa_reg_no') ?></label>
                                                        <div class="col-sm-4">
                                                            <input name="visa_reg_no" autocomplete="off"
                                                                class="form-control" type="text"
                                                                placeholder="<?php echo display('visa_reg_no') ?>"
                                                                id="visa_reg_no"
                                                                value="<?php echo html_escape((!empty($intinfo->visano)?$intinfo->visano:null)) ?>">
                                                        </div>
                                                        <label for="purpose"
                                                            class="col-sm-2 col-form-label"><?php echo display('purpose') ?>
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio"
                                                                    <?php if($intinfo->purpose=="Tourist"){ echo "checked";}?>
                                                                    class="form-check-input" name="purpose"
                                                                    id="materialInline3" value="Tourist">
                                                                <label class="form-check-label"
                                                                    for="materialInline3"><?php echo display('tourist') ?></label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio"
                                                                    <?php if($intinfo->purpose=="Business"){ echo "checked";}?>
                                                                    class="form-check-input" name="purpose"
                                                                    id="materialInline4" value="Business">
                                                                <label class="form-check-label"
                                                                    for="materialInline4"><?php echo display('business') ?></label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio"
                                                                    <?php if($intinfo->purpose=="Official"){ echo "checked";}?>
                                                                    class="form-check-input" name="purpose"
                                                                    id="materialInline5" value="Official">
                                                                <label class="form-check-label"
                                                                    for="materialInline5"><?php echo display('official') ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                                <div class="form-group row">
                                                    <label for="address"
                                                        class="col-sm-2 col-form-label"><?php echo display('address') ?>
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="30" rows="3" autocomplete="off"
                                                            class="form-control"
                                                            placeholder="<?php echo display('address') ?>"><?php echo html_escape((!empty($intinfo->address)?$intinfo->address:null)) ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group text-right">
                                                    <button type="submit"
                                                        class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                                                </div>
                                                <?php echo form_close() ?>

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
    </div>
    <input type="hidden" id="link" value="<?php echo $this->uri->segment('3'); ?>">
    <script src="<?php echo base_url();?>application/modules/customer/assets/js/script.js"></script>
    <script src="<?php echo base_url();?>assets/js/profile.js"></script>
    <?php } else{
    $this->session->set_flashdata('exception', 'Please Login');
    redirect('');
} ?>