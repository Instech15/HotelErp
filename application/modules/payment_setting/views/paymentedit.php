<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
               
                <div class="card-body">

                <?php echo form_open('payment_setting/paymentmethod/create') ?>
                    <?php echo form_hidden('payment_method_id', (!empty($intinfo->payment_method_id)?$intinfo->payment_method_id:null)) ?>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('payment_name') ?></label>
                            <div class="col-sm-8">
                                 <input name="payment" class="form-control" type="text" placeholder="<?php echo display('payment_name') ?>" id="payment" value="<?php echo html_escape((!empty($intinfo->payment_method)?$intinfo->payment_method:null)) ?>">
                            </div>
                        </div> 
						<div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-8">
                            <select name="status"  class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1" <?php if(!empty($intinfo)){if($intinfo->is_active==1){echo "Selected";}} ?>><?php echo display('active') ?></option>
                                <option value="0" <?php if(!empty($intinfo)){if($intinfo->is_active==0){echo "Selected";}} ?>><?php echo display('inactive') ?></option>
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