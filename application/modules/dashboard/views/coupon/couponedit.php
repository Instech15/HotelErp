<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">              
                <div class="panel-body">
                <?php echo form_open_multipart('dashboard/couponlist/create') ?>
                     <?php echo form_hidden('tokenid', (!empty($intinfo->tokenid)?$intinfo->tokenid:null)) ?>
                    <div class="form-group row">
                            <label for="tokencode" class="col-sm-4 col-form-label"><?php echo display('coupon_Code')?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                <input name="tokencode" class="form-control" type="text" placeholder="<?php echo display('coupon_Code') ?>" id="tokencode" value="<?php echo html_escape((!empty($intinfo->tokencode)?$intinfo->tokencode:null)) ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tokenrate" class="col-sm-4 col-form-label"><?php echo  display('coupon_rate'); ?></label>
                            <div class="col-sm-8">
                                <input name="tokenrate" class="form-control" type="text" placeholder="<?php echo  display('coupon_rate'); ?>" id="capacity" value="<?php echo html_escape((!empty($intinfo->tokenrate)?$intinfo->tokenrate:null)) ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="offerstartdate" class="col-sm-4 col-form-label"><?php echo  display('coupon_startdate'); ?></label>
                        <div class="col-sm-8">
                            <input name="offerstartdate" class="form-control datepickers" type="text"  placeholder="<?php echo  display('token_startdate'); ?>" id="offerstartdate"  value="<?php echo html_escape((!empty($intinfo->tokenstartdate)?$intinfo->tokenstartdate:null)) ?>" required>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label for="offerendate" class="col-sm-4 col-form-label"><?php echo  display('coupon_enddate'); ?> </label>
                        <div class="col-sm-8">
                            <input name="offerendate" class="form-control datepickers" type="text"  placeholder="<?php echo  display('coupon_enddate'); ?>" id="offerendate"  value="<?php echo html_escape((!empty($intinfo->tokenendate)?$intinfo->tokenendate:null)) ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                         <div class="col-sm-8 customesl">
                                 <select name="status" class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1" <?php if($intinfo->tokenstatus==1){ echo "selected";}?>><?php echo display('active') ?></option>
                                <option value="2" <?php if($intinfo->tokenstatus==2){ echo "selected";}?>><?php echo display('inactive') ?></option>
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
    <script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>