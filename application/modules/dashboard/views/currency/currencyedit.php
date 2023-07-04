<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
               
                <div class="card-body">
                <?php echo form_open('dashboard/web_setting/currencycreate') ?>
                    <?php echo form_hidden('currencyid', (!empty($intinfo->currencyid)?$intinfo->currencyid:null)) ?>
                        
  						<div class="form-group row">
                            <label for="currencyname" class="col-sm-4 col-form-label"><?php echo display('currency_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="currencyname" class="form-control" type="text" placeholder="Add <?php echo display('currency_name') ?>" id="currencyname" value="<?php echo html_escape((!empty($intinfo->currencyname)?$intinfo->currencyname:null)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="col-sm-4 col-form-label"><?php echo display('currency_icon') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="icon" class="form-control" type="text" placeholder="Add <?php echo display('currency_icon') ?>" id="icon" value="<?php echo html_escape((!empty($intinfo->curr_icon)?$intinfo->curr_icon:null)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-sm-4 col-form-label"><?php echo display('currency_rate') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="rate" class="form-control" type="text" placeholder="Add <?php echo display('currency_rate') ?>" id="rate" value="<?php echo html_escape((!empty($intinfo->curr_rate)?$intinfo->curr_rate:null)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-4 col-form-label"><?php echo display('position') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8 customesl">
                                 <select name="position" class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1" <?php if($intinfo->position==1){ echo "selected";}?>><?php echo display('left') ?></option>
                                <option value="2" <?php if($intinfo->position==2){ echo "selected";}?>><?php echo display('right') ?></option>
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