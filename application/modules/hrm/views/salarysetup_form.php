<div id="add0" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
              <strong><?php echo display('salary_setup')?></strong>

        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">


        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="card">
         
            <div class="card-body">

            <?php echo form_open('hrm/salary-setup') ?>
                <div class="form-group row">
                  <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee_name') ?> <span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                   <?php echo form_dropdown('employee_id',$employee,null,'class="form-control" id="employee_id" onchange="employechange(this.value)"') ?>
                 </div>
               </div>

               <div class="form-group row">
                <label for="payment_period" class="col-sm-3 col-form-label"><?php echo display('salary_type_id') ?> <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                 <input type="text" class="form-control" name="sal_type_name" id="sal_type_name" readonly="">
                 <input type="hidden" class="form-control" name="sal_type" id="sal_type">
               </div>
             </div>
             <div class="row ">
                  <div class="col-sm-6 border border-dark">
                    <table id="add">
                      <tr>
                        <th class="p_10px"><?php echo display('basic') ?></th>
                        <td><input type="text" id="basic" name="basic" class="form-control" disabled=""></td>
                      </tr>
                      <?php
                      $x = 0;
                      foreach ($slname as $ab) {
                      ?>
                        <tr>
                          <th class="p_10px"><?php echo html_escape($ab->sal_name); ?>(%)</th>
                          <td><input type="text" name="amount[<?php echo html_escape($ab->salary_type_id); ?>]" class="form-control addamount" onkeyup="summary()" id="add_<?php echo $x; ?>"></td>
                        </tr>
                      <?php
                        $x++;
                      }
                      ?>
                    </table>
                  </div>
                  <div class="col-sm-6 border border-dark">
                    <table id="dduct">
                      <?php
                      $y = 0;
                      foreach ($sldname as $row) {
                      ?>
                        <tr>
                          <th class="p_10px"><?php echo html_escape($row->sal_name); ?> (%)</th>
                          <td><input type="text" name="amount[<?php echo html_escape($row->salary_type_id); ?>]" onkeyup="summary()" class="form-control deducamount" id="dd_<?php echo $y; ?>"></td>
                        </tr><?php
                              $y++;
                            }
                              ?>
                      <tr>
                        <th class="p_10px"><?php echo display('tax') ?> (%)</th>
                        <td><input type="text" name="amount[]" onkeyup="summary()" class="form-control deducamount" id="taxinput"></td>
                        <td class="p_10px"><input type="checkbox" name="tax_manager" id="taxmanager" onchange='handletax(this);' value="1">Tax Manager</td>
                      </tr>

                    </table>
                  </div>
            </div>
       
      </div>
<div class="form-group row">
   <label for="payable" class="col-sm-3 col-form-label" class="t_align"><?php echo display('gross_salary')?></label>
        <div class="col-sm-6">
<input type="text" class="form-control" name="gross_salary" id="grsalary" readonly="">
       </div>
</div>

   <div class="form-group text-right">
    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('set') ?></button>
  </div>
  <?php echo form_close() ?>

</div>  
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
  <!--  table area -->
  <div class="col-sm-12">
    
    <div class="card"> 
		<div class="card-header"><h4><?php echo display('salary_setup') ?> <small class="float-right">  <?php if($this->permission->method('hrm','create')->access()): ?>
  <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
   <?php echo display('add_salary_setup') ?></button> 
 <?php endif; ?>
 <?php if($this->permission->method('hrm','read')->access()): ?>
 <a href="<?php echo base_url();?>hrm/manage-salary-setup" class="btn btn-primary mb-2"><?php echo display('manage_salary_setup') ?></a>
<?php endif; ?></small></h4></div>
      <div class="card-body">
        <div class="table-responsive">
        <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo display('sl') ?></th>
              <th><?php echo display('employee_name') ?></th>
              <th><?php echo display('employee_id') ?></th>
              <th><?php echo display('sal_type') ?></th>
              <th><?php echo display('date') ?></th>

            </tr>
          </thead>
          <tbody>
            <?php if (!empty($emp_sl_setup)) { ?>
              <?php $sl = 1; ?>
              <?php foreach ($emp_sl_setup as $que) { ?>
                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                  <td><?php echo $sl; ?></td>
                  <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                  <td><?php echo html_escape($que->employee_id); ?></td>
                  <td><?php echo html_escape($que->sal_type); ?></td>
                  <td><?php echo html_escape($que->create_date); ?></td>
                </tr>
                <?php $sl++; ?>
              <?php } ?> 
            <?php } ?> 
          </tbody>
        </table>  <!-- /.table-responsive -->
      </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/salarySetup.js"></script>

