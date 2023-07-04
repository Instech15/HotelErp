  <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4><?php  echo display('update_grant_loan') ?></h4>
                </div>
                <div class="card-body">
                <?php echo form_open('hrm/grant-loan-update/'. $data->loan_id) ?>

                    <input name="loan_id" type="hidden" value="<?php echo html_escape($data->loan_id) ?>">
                 
                       <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                 
                                   <?php echo form_dropdown('employee_id',$gndloan,(!empty($data->employee_id)?$data->employee_id:null),'class="form-control" id="employee_id" ') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permission_by" class="col-sm-3 col-form-label"><?php echo display('permission_by') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                 <?php echo form_dropdown('permission_by',$gndloan,(!empty($data->permission_by)?$data->permission_by:null),'class="form-control" id="permission_by" ') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="loan_details" class="col-sm-3 col-form-label"><?php echo display('loan_details') ?></label>
                            <div class="col-sm-9">
                                <textarea name="loan_details" class="form-control" placeholder="<?php 
                                 echo display('loan_details') ?>" id="loan_details"><?php echo html_escape($data->loan_details) ?></textarea> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_approve" class=" col-sm-3 col-form-label"><?php echo display('date_of_approve') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="date_of_approve" class="datepickers form-control"  placeholder="<?php echo display('date_of_approve') ?>" id="date_of_approve"  value="<?php echo html_escape($data->date_of_approve) ?>" autocomplete="off">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="repayment_start_date" class=" col-sm-3 col-form-label"><?php echo display('repayment_start_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="repayment_start_date" class="datepickers form-control"  placeholder="<?php echo display('repayment_start_date') ?>" value="<?php echo html_escape($data->repayment_start_date) ?>"  id="repayment_start_date" autocomplete="off">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label"><?php echo display('amount') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="amount" class="form-control" type="text" placeholder="<?php echo display('amount') ?>" id="amount"  value="<?php echo html_escape($data->amount) ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="interest_rate" class="col-sm-3 col-form-label"><?php echo display('interest_rate') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="interest_rate" class="form-control"  placeholder="<?php echo display('interest_rate') ?>" id="interest_rate"   value="<?php echo html_escape($data->interest_rate) ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="installment_period" class="col-sm-3 col-form-label"><?php echo display('installment_period') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="installment_period" class="form-control"  placeholder="<?php echo display('installment_period_m') ?>" id="installment_period"  value="<?php echo html_escape($data->installment_period) ?>" autocomplete="off">
                            </div>
                        </div>   
                         <div class="form-group row">
                            <label for="repayment_amount" class="col-sm-3 col-form-label"><?php echo display('repayment_amount') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="repayment_amount" class="form-control"  placeholder="<?php echo display('repayment_amount') ?>" id="repayment_amount"  value="<?php echo html_escape($data->repayment_amount) ?>" readonly>
                            </div>
                        </div>

                        
                          <div class="form-group row">
                            <label for="installment" class="col-sm-3 col-form-label"><?php echo display('installment') ?></label>
                            <div class="col-sm-9">
                                <input type="text" name="installment" class="form-control"  placeholder="<?php echo display('installment') ?>" id="installment"  value="<?php echo html_escape($data->installment) ?>" readonly>
                            </div>
                        </div> 
                          
                        
                        <div class="form-group row">
                            <label for="loan_status" class="col-sm-3 col-form-label"><?php echo display('loan_status') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                            <select name="loan_status" class="form-control"  placeholder="<?php echo display('loan_status') ?>" id="loan_status">
                           <option value="1" <?php  if($data->loan_status==1){ echo 'selected';} ?>><?php echo display('granted') ?></option>
                          <option value="0" <?php  if($data->loan_status==0){ echo 'selected';} ?>><?php echo display('deny') ?></option>
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
   
    <script src="<?php echo MOD_URL.$module;?>/assets/js/grandLoanForm.js"></script>