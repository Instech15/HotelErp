    <div class="section" height="250px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">
                    
                        <?php if($this->session->userdata('message')) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->userdata('message'); 
						 $this->session->unset_userdata('message');
						?>
                    </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('exception')) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->userdata('exception');
						 $this->session->unset_userdata('exception');
						 ?>
                    </div>
                    <?php } ?>
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $html='';
            $wtapp = $this->db->select('*')->from('whatsapp_settings')->get()->row();
            $storeinfo = $this->hotel_model->read('*', 'setting', array('id' => 2));
            $currencysign = getCurrency();
            $wporderinfo = $this->hotel_model->read('*', 'booked_info', array('booking_number' => $orderid));
            $customerinfo = $this->hotel_model->read('*', 'customerinfo', array('customerid' => $wporderinfo->cutomerid));
            $storename=$storeinfo->storename;
            $html.='Hi! I would Like To take a Reservation %0a--------------------------------------- %0a*Booking Number꞉ '.$orderid.' || Reservation Date꞉ '.date("Y-m-d", strtotime($wporderinfo->checkindate)).'*%0a Customer Name꞉ '.$customerinfo->firstname.' '.$customerinfo->lastname.'%0a Customer Address꞉ '.$customerinfo->address.'%0a---------------------------------------%0a';
            $html.='Phone Number꞉ '.$customerinfo->cust_phone; 
            $html.=' %0aRoom Number꞉ '.$wporderinfo->room_no; 
            $html.=" %0aTotal Price:  ".$currencysign->curr_icon.$wporderinfo->total_price.'%0a';
	?>
<input type="hidden" id="wamsg" value="<?php echo $html;?>">
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url() ?>website_assets/js/wabooking.js?v=1"></script>
     