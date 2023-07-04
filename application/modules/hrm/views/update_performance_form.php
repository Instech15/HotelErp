
   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header"><h4><?php echo display('update_employee_performance') ?></h4></div>
                <div class="card-body">

                <?php echo form_open('hrm/employe-performance-update/'. $data->emp_per_id) ?>
                

                    <input name="emp_per_id" type="hidden" value="<?php echo html_escape($data->emp_per_id) ?>">
                 
                         <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee_name') ?> </label>
                            <div class="col-sm-6">
                                  <?php echo form_dropdown('employee_id',$employee,(!empty($data->employee_id)?$data->employee_id:null),'class="form-control" id="employee_id"') ?>
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-sm-3 col-form-label"><?php echo display('note') ?></label>
                            <div class="col-sm-6">
                                <input type="text" name="note" class="form-control" id="note" value="<?php echo html_escape($data->note)?>">
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> </label>
                            <div class="col-sm-6">
                                <input type="text" name="date" class="form-control" value="<?php echo html_escape($data->date)?>">
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="note_by" class="col-sm-3 col-form-label"><?php echo display('note_by') ?> </label>
                            <div class="col-sm-6">
                                <input type="text" name="note_by" class="form-control" id="note_by" value="<?php echo html_escape($data->note_by)?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="number_of_star" class="col-sm-3 col-form-label"><?php echo display('number_of_star') ?> </label>
                            <div class="col-sm-6">
                                <input type="text" name="number_of_star" class="form-control" id="number_of_star" onkeyup="starcheck()" value="<?php echo html_escape($data->number_of_star)?>">
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label"><?php echo display('status') ?> </label>
                            <div class="col-sm-6">
                                <input type="text" name="status" class="form-control" id="status" value="<?php echo html_escape($data->status)?>">
                            </div>
                        </div> 
                       <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6 text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                            </div>
                        </div> 

                    <?php echo form_close() ?>


                </div>  
            </div>
        </div>
    </div>

    <script src="<?php echo MOD_URL.$module;?>/assets/js/performanceForm.js"></script>