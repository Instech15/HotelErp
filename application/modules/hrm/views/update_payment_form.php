<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-heading">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/Employees/update_payment_form/'. $data->emp_sal_pay_id) ?>
                

                    <input name="emp_sal_pay_id" type="hidden" value="<?php echo html_escape($data->emp_sal_pay_id) ?>">
                 
                         <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="empname" class="form-control" id="employee_id" value="<?php echo html_escape($data->first_name.' '.$data->last_name);?>">
                                <input type="hidden" name="employee_id" class="form-control" id="employee_id" value="<?php echo html_escape($data->employee_id)?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_salary" class="col-sm-3 col-form-label"><?php echo display('total_salary') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="total_salary" class="form-control" id="total_salary" value="<?php echo html_escape($data->total_salary)?>">
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="total_working_minutes" class="col-sm-3 col-form-label"><?php echo display('total_working_minutes') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="total_working_minutes" class="form-control" id="total_working_minutes" value="<?php echo html_escape($data->total_working_minutes)?>">
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="working_period" class="col-sm-3 col-form-label"><?php echo display('working_period') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="working_period" class="form-control" id="working_period" value="<?php echo html_escape($data->working_period)?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="payment_due" class="col-sm-3 col-form-label"><?php echo display('payment_due') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                              
                                <select  name="payment_due" class="form-control" id="payment_due">
                                    <option value="unpaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="payment_date" class="col-sm-3 col-form-label"><?php echo display('payment_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="payment_date" class="datepickers form-control" id="payment_date" value="<?php echo html_escape($data->payment_date)?>"/>
                            </div>
                        </div> 
                          


                        <div class="form-group text-right">
                            
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('paid') ?></button>
                        </div>

                    <?php echo form_close() ?>


                </div>  
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/lnReport.js"></script>
    
