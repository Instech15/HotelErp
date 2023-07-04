<div class="card">
    <div class="card-header"> <h4><?php echo display("add_customer");?> <small class="float-right"><a href="<?php echo base_url("customer/customer_info") ?>" class="btn btn-primary btn-md"><i class="ti-plus" aria-hidden="true"></i> <?php echo display('customer_list')?></a></small></h4></div>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card-body">
                <?php echo form_open('customer/customer_info/create');?>
                <?php echo form_hidden('customerid', (!empty($intinfo->customerid)?$intinfo->customerid:null)) ?>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-2 col-form-label"><?php echo display('firstname') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="firstname" autocomplete="off" class="form-control" required type="text" placeholder="<?php echo display('firstname') ?>" id="firstname" value="">
                    </div>
                    <label for="lastname" class="col-sm-2 col-form-label"><?php echo display('lastname') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="lastname" autocomplete="off" class="form-control" required type="text" placeholder="<?php echo display('lastname') ?>" id="lastname" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label"><?php echo display('email') ?><span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="email" autocomplete="off" class="form-control" type="text" required placeholder="<?php echo display('email') ?>" id="email" value="">
                    </div>
                    <label for="phone" class="col-sm-2 col-form-label"><?php echo display('phone') ?><span class="text-danger">*</span> </label>
                    <div class="col-sm-4">
                        <input name="phone" autocomplete="off" class="form-control" required type="number" placeholder="<?php echo display('phone') ?>" id="phone" value="">
                        <small class="form-text text-muted"><?php echo display('phone_message') ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><?php echo display('dob') ?></label>
                    <div class="col-sm-4">
                        <input name="dob" autocomplete="off" class="datepickers form-control" type="text" placeholder="<?php echo display('dob') ?>" id="dob" value="">
                    </div>
                    <label for="profession" class="col-sm-2 col-form-label"><?php echo display('profession') ?> </label>
                    <div class="col-sm-4">
                        <input name="profession" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('profession') ?>" id="profession" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label"><?php echo display('nationality') ?> <span class="text-danger">*</span> </label>
                    <div class="col-sm-4 radioheightalign">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="nationaliti" id="materialInline1" value="native" checked="">
                            <label class="form-check-label"  for="materialInline1"><?php echo display('native') ?></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="nationaliti" id="materialInline2" value="foreigner">
                            <label class="form-check-label"  for="materialInline2"><?php echo display('foreigner') ?></label>
                        </div>
                    </div>
                    <label for="national_id" class="col-sm-2 col-form-label"><?php echo display('national_id') ?> </label>
                    <div class="col-sm-4">
                        <input name="national_id" autocomplete="off" class="form-control" type="number" placeholder="<?php echo display('national_id') ?>" id="national_id" value="">
                    </div>
                </div>
                <span id="foreignerinfo" class="d_none">
                    <div class="form-group row">
                        <label for="nationalitycon" class="col-sm-2 col-form-label"><?php echo display('nationality') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input name="nationalitycon" id="nationalitycon" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('nationality') ?>" id="nationalitycon" value="">
                        </div>
                        <label for="passport_no" class="col-sm-2 col-form-label"><?php echo display('passport_no') ?> <span class="text-danger">*</span> </label>
                        <div class="col-sm-4">
                            <input name="passport_no" id="passport_no" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('passport_no') ?>" id="passport_no" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="visa_reg_no" class="col-sm-2 col-form-label"><?php echo display('visa_reg_no') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input name="visa_reg_no" id="visa_reg_no" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('visa_reg_no') ?>" id="visa_reg_no" value="">
                        </div>
                        <label for="purpose" class="col-sm-2 col-form-label"><?php echo display('purpose') ?> <span class="text-danger">*</span> </label>
                        <div class="col-sm-4 radioheightalign">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="purpose" id="materialInline3" value="Tourist">
                                <label class="form-check-label"  for="materialInline3"><?php echo display('tourist') ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="purpose" id="materialInline4" value="Business">
                                <label class="form-check-label"  for="materialInline4"><?php echo display('business') ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="purpose" id="materialInline5" value="Official">
                                <label class="form-check-label"  for="materialInline5"><?php echo display('official') ?></label>
                            </div>
                        </div>
                    </div>
                </span>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label"><?php echo display('address') ?> </label>
                    <div class="col-sm-10">
                        <textarea name="address" cols="30" rows="3" autocomplete="off" class="form-control" placeholder="<?php echo display('address') ?>"></textarea>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>