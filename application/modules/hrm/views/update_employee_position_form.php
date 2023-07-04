 <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-heading">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/Employees/update_emp_pos_form/'. $data->emp_pos_id) ?>
                

                    <input name="emp_pos_id" type="hidden" value="<?php echo html_escape($data->emp_pos_id) ?>">
                 
                         <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                 <input type="text" name="employee_id" class="form-control" id="employee_id" value="<?php echo html_escape($data->employee_id)?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pos_id" class="col-sm-3 col-form-label"><?php echo display('pos_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="pos_id" class="form-control" id="pos_id" value="<?php echo html_escape($data->pos_id)?>">
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="position_details" class="col-sm-3 col-form-label"><?php echo display('position_details') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="position_details" class="form-control" id="position_details"><?php echo html_escape($data->position_details)?></textarea>
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
    <script src="<?php echo MOD_URL.$module;?>/assets/js/updateEmplyoyeePossition.js"></script>