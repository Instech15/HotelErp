    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4><?php echo display('update_position') ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open_multipart('hrm/position-update/'. $data->pos_id) ?>
                

                    <input name="pos_id" type="hidden" value="<?php echo html_escape($data->pos_id) ?>">
                 
                        <div class="form-group row">
                            <label for="position_name" class="col-sm-3 col-form-label"><?php echo display('position_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="position_name" class="form-control" type="text" value="<?php echo html_escape($data->position_name) ; ?>" id="position_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position_details" class="col-sm-3 col-form-label"><?php echo display('position_details') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="position_details" class="form-control" id="position_details" value="<?php echo html_escape($data->position_details)?>">
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
     