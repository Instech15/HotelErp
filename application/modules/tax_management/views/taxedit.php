<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <?php echo form_open('tax_management/tax/create'); ?>
                    <?php echo form_hidden('tax_id', (!empty($intinfo->tax_id)?$intinfo->tax_id:null)) ?>
                        <div class="form-group row">
                            <label for="tax" class="col-sm-4 col-form-label"><?php echo display(
                                "tax_name"); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="tax" autocomplete="off" class="form-control" type="text" value="<?php echo html_escape((!empty($intinfo->taxname)?$intinfo->taxname:null)) ?>" placeholder="<?php echo display("tax_name"); ?>" id="tax" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-sm-4 col-form-label"><?php echo display('s_rate'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="rate" autocomplete="off" class="form-control" type="text" value="<?php echo html_escape((!empty($intinfo->rate)?$intinfo->rate:null)) ?>" placeholder="<?php echo display('s_rate'); ?>" id="rate" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reg_no" class="col-sm-4 col-form-label"><?php echo display('reg_no'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="reg_no" autocomplete="off" class="form-control" type="text" value="<?php echo html_escape((!empty($intinfo->reg_no)?$intinfo->reg_no:null)) ?>" placeholder="<?php echo display('reg_no'); ?>" id="reg_no" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isactive" class="col-sm-4 col-form-label"><?php echo display('is_active'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                                <input name="isactive" autocomplete="off" class="check-align" type="checkbox" <?php if($intinfo->isactive==1){echo "Checked";} ?> value="<?php echo html_escape((!empty($intinfo->isactive)?$intinfo->isactive:null)) ?>">
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
    <script src="<?php echo MOD_URL . $module; ?>/assets/js/taxedit.js"></script>