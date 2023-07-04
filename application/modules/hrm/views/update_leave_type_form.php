 
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4><?php echo display('update_leave_type') ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/Leave/update_leave_type/'. $data->leave_type_id) ?>
                
                        <input name="leave_type_id" type="hidden" value="<?php echo html_escape($data->leave_type_id) ?>">
                          <div class="form-group row">
                            <label for="leave_type" class="col-sm-3 col-form-label"><?php echo display('leave_type') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="leave_type" class="form-control" type="text" value="<?php echo html_escape($data->leave_type) ?>" id="leave_type"  required >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="leave_type" class="col-sm-3 col-form-label"><?php echo display('number_of_leave_days') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="leave_days" class="form-control" type="number" value="<?php echo html_escape($data->leave_days) ?>" id="leave_days"  required >
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