<div class="card">
    <div class="card-header">
        <h4><?php echo display('customer_edit')?> <small class="float-right"><a href="<?php echo base_url("customer/customer_info") ?>" class="btn btn-primary btn-md"><i class="ti-plus" aria-hidden="true"></i> <?php echo display('customer_list')?></a></small></h4>
    </div>
    <div class="row">
        <div class="col-sm-12">
            
            <div class="card-body">
                <?php echo form_open('customer/customer_info/create/'.$intinfo->customerid);?>
                <?php echo form_hidden('customerid', (!empty($intinfo->customerid)?$intinfo->customerid:null)) ?>
                <?php echo form_hidden('customernumber', (!empty($intinfo->customernumber)?$intinfo->customernumber:null)) ?>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-2 col-form-label"><?php echo display('firstname') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="firstname" autocomplete="off" required class="form-control" type="text" placeholder="<?php echo display('firstname') ?>" id="firstname" value="<?php echo html_escape((!empty($intinfo->firstname)?$intinfo->firstname:null)) ?>">
                    </div>
                    <label for="lastname" class="col-sm-2 col-form-label"><?php echo display('lastname') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="lastname" required autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('lastname') ?>" id="lastname" value="<?php echo html_escape((!empty($intinfo->lastname)?$intinfo->lastname:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label"><?php echo display('email') ?><span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="email" autocomplete="off" required class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="email" value="<?php echo html_escape((!empty($intinfo->email)?$intinfo->email:null)) ?>">
                    </div>
                    <label for="phone" class="col-sm-2 col-form-label"><?php echo display('phone') ?> <span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <input name="phone" autocomplete="off" required class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" value="<?php echo html_escape((!empty($intinfo->cust_phone)?$intinfo->cust_phone:null)) ?>">
                        <small class="form-text text-muted"><?php echo display('phone_message') ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><?php echo display('dob') ?></label>
                    <div class="col-sm-4">
                        <input name="dob" autocomplete="off" class="datepickers form-control" type="text" placeholder="<?php echo display('dob') ?>" id="dob" value="<?php echo html_escape((!empty($intinfo->dob)?$intinfo->dob:null)) ?>">
                    </div>
                    <label for="profession" class="col-sm-2 col-form-label"><?php echo display('profession') ?> </label>
                    <div class="col-sm-4">
                        <input name="profession" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('profession') ?>" id="profession" value="<?php echo html_escape((!empty($intinfo->profession)?$intinfo->profession:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label"><?php echo display('nationality') ?> </label>
                    <div class="col-sm-4 radioheightalign">
                        <div class="form-check form-check-inline">
                            <input type="radio" <?php if($intinfo->isnationality=="native"){ echo "checked";}?> class="form-check-input" name="nationaliti" id="materialInline1" value="native">
                            <label class="form-check-label"  for="materialInline1"><?php echo display('native') ?></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" <?php if($intinfo->isnationality=="foreigner"){ echo "checked";}?> name="nationaliti" id="materialInline2" value="foreigner">
                            <label class="form-check-label"  for="materialInline2"><?php echo display('foreigner') ?></label>
                        </div>
                    </div>
                    <label for="national_id" class="col-sm-2 col-form-label"><?php echo display('national_id') ?></label>
                    <div class="col-sm-4">
                        <input name="national_id" autocomplete="off" class="form-control" type="number" placeholder="<?php echo display('national_id') ?>" id="national_id" value="<?php echo html_escape((!empty($intinfo->pid)?$intinfo->pid:null)) ?>">
                    </div>
                </div>
                <span id="foreignerinfo" style="display:<?php if($intinfo->isnationality=="foreigner"){ echo "block";}else{ echo "none";}?>;">
                    <div class="form-group row">
                        <label for="nationalitycon" class="col-sm-2 col-form-label"><?php echo display('nationality') ?></label>
                        <div class="col-sm-4">
                            <input name="nationalitycon" id="nationalitycon" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('nationality') ?>" id="nationalitycon" value="<?php echo html_escape((!empty($intinfo->nationality)?$intinfo->nationality:null)) ?>">
                        </div>
                        <label for="passport_no" class="col-sm-2 col-form-label"><?php echo display('passport_no') ?> </label>
                        <div class="col-sm-4">
                            <input name="passport_no" id="passport_no" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('passport_no') ?>" id="passport_no" value="<?php echo html_escape((!empty($intinfo->passport)?$intinfo->passport:null)) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="visa_reg_no" class="col-sm-2 col-form-label"><?php echo display('visa_reg_no') ?></label>
                        <div class="col-sm-4">
                            <input name="visa_reg_no" id="visa_reg_no" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('visa_reg_no') ?>" id="visa_reg_no" value="<?php echo html_escape((!empty($intinfo->visano)?$intinfo->visano:null)) ?>">
                        </div>
                        <label for="purpose" class="col-sm-2 col-form-label"><?php echo display('purpose') ?> </label>
                        <div class="col-sm-4 radioheightalign">
                            <div class="form-check form-check-inline">
                                <input type="radio" <?php if($intinfo->purpose=="Tourist"){ echo "checked";}?> class="form-check-input" name="purpose" id="materialInline3" value="Tourist">
                                <label class="form-check-label"  for="materialInline3"><?php echo display('tourist') ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" <?php if($intinfo->purpose=="Business"){ echo "checked";}?> class="form-check-input" name="purpose" id="materialInline4" value="Business">
                                <label class="form-check-label"  for="materialInline4"><?php echo display('business') ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" <?php if($intinfo->purpose=="Official"){ echo "checked";}?> class="form-check-input" name="purpose" id="materialInline5" value="Official">
                                <label class="form-check-label"  for="materialInline5"><?php echo display('official') ?></label>
                            </div>
                        </div>
                    </div>
                </span>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label"><?php echo display('address') ?> </label>
                    <div class="col-sm-10">
                        <textarea name="address" cols="30" rows="3" autocomplete="off" class="form-control" placeholder="<?php echo display('address') ?>"><?php echo html_escape((!empty($intinfo->address)?$intinfo->address:null)) ?></textarea>
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