<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <?php echo form_open('customer/customer_info/updateguest'); ?>
                    <?php echo form_hidden('guestid', (!empty($intinfo->otherguest_id)?$intinfo->otherguest_id:null)) ?>
                        
                        <div class="form-group row">
                            <label for="guestname" class="col-sm-4 col-form-label"><?php echo display("guest") ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="guestname" class="form-control" type="text" placeholder="<?php echo display("guest") ?>" id="guestname" value="<?php echo html_escape((!empty($intinfo->guestname)?$intinfo->guestname:null)) ?>" required>
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