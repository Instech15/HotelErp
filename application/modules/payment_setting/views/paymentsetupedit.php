<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
               
                <div class="card-body">

                <?php echo form_open('payment_setting/paymentmethod/psetupcreate') ?>
                   <?php echo form_hidden('setupid', (!empty($intinfo->setupid)?$intinfo->setupid:null)) ?>
                     <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('payment_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8 customesl">
                                <?php if(empty($paymentlist)){$paymentlist = array('' => '--Select--');}
						echo form_dropdown('payment',$paymentlist,(!empty($intinfo->paymentid)?$intinfo->paymentid:null),'class="form-control" id="payment" required') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('marchantid') ?></label>
                            <div class="col-sm-8">
                                 <input name="marchantid" class="form-control" type="text" placeholder="<?php echo display('marchantid') ?>" value="<?php echo html_escape((!empty($intinfo->marchantid)?$intinfo->marchantid:null)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('password') ?></label>
                            <div class="col-sm-8">
                                 <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" value="<?php echo html_escape((!empty($intinfo->password)?$intinfo->password:null)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('email') ?></label>
                            <div class="col-sm-8">
                                 <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" value="<?php echo html_escape((!empty($intinfo->email)?$intinfo->email:null)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('currency') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8 customesl">
                                <?php if(empty($currency_list)){$currency_list = array('' => '--Select--');}
						echo form_dropdown('currency',$currency_list,(!empty($intinfo->currency)?$intinfo->currency:null),'class="form-control" id="currency" ') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="islive" class="col-sm-4 col-form-label"><?php echo display('is_live_or_test') ?></label>
                        <div class="col-sm-8 customesl">
                            <select name="islive" class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                 <option value="1" <?php if(!empty($intinfo)){if($intinfo->Islive==1){echo "Selected";}} ?>><?php echo display('live') ?></option>
                                <option value="0" <?php if(!empty($intinfo)){if($intinfo->Islive==0){echo "Selected";}} ?>><?php echo display('test_mode') ?></option>
                              </select>
                        </div>
                    </div>
						<div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-8">
                            <select name="status"  class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1" <?php if(!empty($intinfo)){if($intinfo->status==1){echo "Selected";}} ?>><?php echo display('active') ?></option>
                                <option value="0" <?php if(!empty($intinfo)){if($intinfo->status==0){echo "Selected";}} ?>><?php echo display('inactive') ?></option>
                              </select>
                        </div>
                    </div>
  
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>