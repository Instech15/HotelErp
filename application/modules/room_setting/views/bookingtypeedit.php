<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <?php echo form_open('room_setting/booking_type/create'); ?>
                    <?php echo form_hidden('booktypeid', (!empty($intinfo->booktypeid)?$intinfo->booktypeid:null)) ?>
                        
                        <div class="form-group row">
                            <label for="booking_type" class="col-sm-4 col-form-label"><?php echo display('booking_type') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="booking_type" class="form-control" type="text" placeholder="<?php echo display('booking_type') ?>" id="booking_type" value="<?php echo html_escape((!empty($intinfo->booktypetitle)?$intinfo->booktypetitle:null)) ?>" required>
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