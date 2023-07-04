<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-body">
                <?php echo form_open('customer/customer_info/updwacallfrm') ?>
                <?php echo form_hidden('wapupid', (!empty($wacall_info->wapupid)?$wacall_info->wapupid:null)) ?>
                <div class="form-group row">
                    <label for="cust_name" class="col-sm-4 col-form-label"><?php echo display('cust_name') ?> <span class="text-danger">*</span></label>
                <div class="col-sm-8 mb-2">
                        <?php echo form_dropdown('cust_name', $employeename, $wacall_info->custid, 'class="form-control basic-single" id="cust_name" required') ?>
                </div>

                <label for="wakeupcall_time" class="col-sm-4 col-form-label"><?php echo display('wakeup_time') ?> <span class="text-danger">*</span></label>
                <div class="col-sm-8 mb-2">
                        <input type="text" name="wakeupcall_time" class="form-control datetimepickers2" value="<?php echo html_escape((!empty($wacall_info->wakeupcall_time)?$wacall_info->wakeupcall_time:null)) ?>" placeholder="<?php echo display('wakeup_time') ?>">
                </div>
                <label for="remarks" class="col-sm-4 col-form-label"><?php echo display('remarks') ?> </label>
                <div class="col-sm-8 mb-2">
                <textarea  name="remarks" id="remarks" placeholder="<?php echo display('remarks') ?>"  class="form-control"><?php echo html_escape((!empty($wacall_info->remarks)?$wacall_info->remarks:null)) ?></textarea>
                </div>
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-danger w-md m-b-5" data-dismiss="modal"><?php echo display('cancel') ?></button>
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>
                
                

                </div>  
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/wakeup_call_edit.js"></script>