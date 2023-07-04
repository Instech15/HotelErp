   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header"><h4><?php echo display('installment_update') ?></h4></div>
                <div class="card-body">
                <?php echo form_open('hrm/loan-installment-update/'. $data->loan_inst_id) ?>


                    <input name="loan_inst_id" type="hidden" value="<?php echo html_escape($data->loan_inst_id) ?>">
                 
                       <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee_name') ?> <span class="text-danger">*</span></label>

                            
                            <div class="col-sm-9">
                            <?php
        echo form_dropdown('employee_id', $gndloan,(!empty($data->employee_id)?$data->employee_id:null), 'class="form-control" onchange="SelectToLoad(this.value)"');
        ?>
                         
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="loan_id" class="col-sm-3 col-form-label"><?php echo display('loan_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                  <select name="loan_id" class="form-control" onchange="SelectToname(this.value),SelectAuto(this.value)" id="loan_id" >
                                      <option value="<?php echo html_escape($data->loan_id); ?>" selected><?php echo html_escape($data->loan_id); ?></option>
                                  </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="installment_amount" class="col-sm-3 col-form-label"><?php echo display('installment_amount') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="installment_amount" class="form-control" placeholder="<?php 
                                 echo display('installment_amount') ?>" id="installment_amount" value="<?php echo html_escape($data->installment_amount); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-3 col-form-label"><?php echo display('payment') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="payment" class="form-control" type="text" placeholder="<?php echo display('payment') ?>" id="payment" value="<?php echo html_escape($data->payment); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="date" class="datepickers form-control"  placeholder="<?php echo display('date') ?>" value="<?php echo html_escape($data->date); ?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="received_by" class="col-sm-3 col-form-label"><?php echo display('received_by') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                  <?php
        echo form_dropdown('received_by', $gndloan,(!empty($data->received_by)?$data->received_by:null), 'class="form-control"');
        ?>
                            </div>
                        </div>   
                         <div class="form-group row">
                            <label for="installment_no" class="col-sm-3 col-form-label"><?php echo display('installment_no') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="installment_no" class="form-control"  placeholder="<?php echo display('installment_no') ?>" id="installment_no" value="<?php echo html_escape($data->installment_no); ?>" >
                            </div>
                        </div>

                        
                          <div class="form-group row">
                            <label for="notes" class="col-sm-3 col-form-label"><?php echo display('notes') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea  name="notes" class="form-control"  placeholder="<?php echo display('notes') ?>" id="notes" ><?php echo html_escape($data->notes); ?></textarea>
                            </div>
                        </div> 
                          
             
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('paid') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/installmentForm.js"></script>