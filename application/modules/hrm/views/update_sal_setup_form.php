       <div class="row">
           <div class="col-sm-12 col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h4><?php echo display('update_salary_setup') ?></h4>
                   </div>
                   <div class="card-body">

                       <?php echo form_open('hrm/Payroll/updates_salstup_form/'. (!empty($data->employee_id)?$data->employee_id:null)) ?>
                       <div class="form-group row">
                           <label for="employee_id"
                               class="col-sm-3 col-form-label"><?php echo display('employee_name') ?> <span
                                   class="text-danger">*</span></label>
                           <div class="col-sm-9">
                               <?php echo form_dropdown('employee_id',$employee,(!empty($data->employee_id)?$data->employee_id:null),'class="form-control width_615px" id="employee_id" onchange="employechange(this.value)"') ?>
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="payment_period"
                               class="col-sm-3 col-form-label"><?php echo display('salary_type_id') ?> <span
                                   class="text-danger">*</span></label>
                           <div class="col-sm-9">
                               <input type="text" class="form-control" name="sal_type_name" id="sal_type_name" value="<?php if($EmpRate->rate_type==1){
                    echo display('hourly');
                 }else{
                    echo display('salary');
                 }?>">
                               <input type="hidden" class="form-control" name="sal_type" id="sal_type"
                                   value="<?php echo html_escape($EmpRate->rate_type); ?>">
                           </div>
                       </div>


                       <div class="row ">
                           <div class="col-sm-6 border border-dark">
                               <table id="add">
                                   <?php foreach($amo as $basic){}?>
                                   <tr>
                                       <th class="p_10px"><?php echo display('basic') ?></th>
                                       <td><input type="text" id="basic" name="basic" class="form-control" disabled=""
                                               value="<?php echo html_escape($EmpRate->rate); ?>"></td>
                                   </tr>
                                   <?php
                 $x=0;
                foreach($amo as $value){?>
                                   <tr>
                                       <th class="p_10px"><?php echo html_escape($value->sal_name) ;?> (%)</th>
                                       <td>
                                           <input type="text"
                                               name="amount[<?php echo html_escape($value->salary_type_id); ?>]"
                                               class="form-control addamount" onkeyup="summary()"
                                               value="<?php echo html_escape($value->amount); ?>"
                                               id="add_<?php echo $x;?>">
                                       </td>
                                   </tr>
                                   <?php $x++;} ?>
                               </table>
                           </div>
                           <div class="col-sm-6 border border-dark">
                               <table id="dduct">
                                   <?php
                $y=0;
                foreach ($samlft as $row){

                  ?>
                                   <tr>
                                       <th class="p_10px"><?php echo html_escape($row->sal_name) ;?> (%)</th>
                                       <td><input type="text"
                                               name="amount[<?php echo html_escape($row->salary_type_id); ?>]"
                                               onkeyup="summary()" class="form-control deducamount"
                                               value="<?php echo html_escape($row->amount) ?>" id="dd_<?php echo $y;?>">
                                       </td>
                                   </tr><?php
               $y++; }
                ?>
                                   <tr>
                                       <th class="p_10px"><?php echo display('tax') ?> (%)</th>
                                       <td><input type="text" name="amount[]" onkeyup="summary()"
                                               class="form-control deducamount" id="taxinput" <?php if($EmpRate->rate_type==1){
                    echo 'readonly';
                } ?>></td>
                                       <td class="p_10px"><input type="checkbox" name="tax_manager" id="taxmanager"
                                               onchange='handletax(this);' value="1" <?php if($EmpRate->rate_type==1){
                    echo display('checked').'  '.'disabled';
                } ?>><?php echo display('manage_tax') ?></td>
                                   </tr>


                               </table>
                           </div>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="payable"
                           class="col-sm-3 col-form-label t_align"><?php echo display('gross_salary') ?></label>
                       <div class="col-sm-6">
                           <input type="text" class="form-control" name="gross_salary"
                               value="<?php echo html_escape($basic->gross_salary); ?>" id="grsalary" readonly="">
                       </div>
                   </div>

                   <div class="form-group text-right">
                       <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                       <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                   </div>
                   <?php echo form_close() ?>

               </div>
           </div>
       </div>
       <script src="<?php echo MOD_URL.$module;?>/assets/js/salarySetup.js"></script>