<link href="<?php echo base_url('assets/plugins/toastr/toastr.css') ?>" rel="stylesheet" type="text/css"/>
<?php if($this->cart->contents()) { ?>
<div class="section section-checkout bg-gray">
    <div class="container">
        <div class="row">
            
            <div class="col-md-6 mb-4 mb-md-0">
                <h3 class="custom-title position-relative font-weight-bold mb-4"><?php echo display('check_details') ?>
                </h3>
                <div class="card card-body border-0 p-5">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold"><?php echo display('name') ?> </h6>
                            <div class=""><?php echo html_escape($userinfo->firstname.' '.$userinfo->lastname)?></div>
                        </div>
                        <!--<div id="brickpaycustfname"><?php //echo html_escape($userinfo->firstname); ?></div>
                        <div id="brickpaycustlname"><?php //echo html_escape($userinfo->lastname); ?></div>-->
                        <div class="col-md-6">
                            <h6 class="font-weight-bold"><?php echo display('address') ?></h6>
                            <div class=""><?php echo html_escape($userinfo->address);?></div>
                        </div>
                    </div>
                    <div class="phone-text mb-5">
                        <h6 class="font-weight-bold"><?php echo display('phone') ?></h6>
                        <!--<div id="brickpaycustphone">--><?php echo html_escape($userinfo->cust_phone);?><!--</div>-->
                    </div>
                    <div class="email-text mb-5">
                        <h6 class="font-weight-bold"><?php echo display('email') ?></h6>
                        <!--<div id="brickpayemail"><?php //echo html_escape($userinfo->email);?></div>-->
                        <a
                            href="mailto:<?php echo html_escape($userinfo->email);?>"><?php echo html_escape($userinfo->email);?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="custom-title position-relative font-weight-bold mb-4">
                    <?php echo display('payment_details') ?></h3>
                <div class="card card-body p-5 border-0">
                    <?php echo form_open('paymentconfirm');?>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <label class="text-dark font-weight-600"><?php echo display('payment_method') ?></label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="pmethod">
                                <?php foreach($paymentmethod as $pmethod){?>
                                <option <?php if($pmethod->payment_method_id==4){ echo "selected";}?>
                                    value="<?php echo html_escape($pmethod->payment_method_id);?>">
                                    <?php echo html_escape($pmethod->payment_method);?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold"><?php echo display('amount') ?></h6>
                            <?php $cart = $this->cart->contents();
									foreach($cart as $item){
									?>
                            <div  class="">
                                <?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo html_escape(number_format(round($item['totalprice']),2,'.',','));?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?>
                            </div>
                            <!--<div  id="brickcheckoutamount"><?php echo html_escape(round($item['totalprice']));?></div>--> 
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" id="disablemode" onclick="checkyear()" class="btn btn-primary"><?php echo display('submit') ?></button>
                        </div>
                    </div>
                    <input type="hidden" name="finyear" id="finyear" value="<?php echo financial_year(); ?>">

                    <?php echo form_close() ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!--<script src="https://js.paystack.co/v2/inline.js"></script>
<script>
  const paystack = new PaystackPop();
paystack.newTransaction({
   key: 'pk_test_32202b8c36f266ce163bd4e86dd65cb3e7b7163e',
    email: document.getElementById("brickpayemail").textContent,
    amount:  document.getElementById("brickcheckoutamount").textContent * 100,
    firt_name: document.getElementById("brickpaycustfname").textContent,
    last_name: document.getElementById("brickpaycustlname").textContent,
    phone: document.getElementById("brickpaycustphone").textContent,
  
  onSuccess: (transaction) => { 
    // Payment complete! Reference: transaction.reference
    alert(transaction.reference )
  },
  onCancel: () => {
    // user closed popup
  }
});

</script>-->
 <!--<input type="hidden" id="productmode" value="demo">--> 
<?php } else{
    $this->session->set_flashdata('exception', 'Please Select a Room First');
    redirect('');
} ?>


<script src="<?php echo base_url('website_assets/js/demo.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js') ?>" type="text/javascript"></script>