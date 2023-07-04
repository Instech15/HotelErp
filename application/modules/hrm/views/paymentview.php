<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
 <div class="card-header">
                        <h4><?php echo display('employee_payment') ?></h4>
                    </div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                                    <th><?php echo display('Sl') ?></th>
                                    <th><?php echo display('manage_performance') ?></th>
                                    <th><?php echo display('employee_id') ?></th>
                                    <th><?php echo display('total_salary') ?></th>
                                    <th><?php echo display('total_working_minutes') ?></th>
                                    <th><?php echo display('working_period') ?></th>
                                    <th><?php echo display('payment_due') ?></th>
                                    <th><?php echo display('payment_date') ?></th>
                                    <th><?php echo display('paid_by') ?></th>
                                    <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_pay)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($emp_pay as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                                        <td><?php echo html_escape($que->employee_id); ?></td>
                                        <td><?php echo html_escape($que->total_salary); ?></td>
                                        <td><?php echo html_escape($que->total_working_minutes); ?></td>
                                        <td><?php echo html_escape($que->working_period); ?></td>
                                        <td><?php echo html_escape($que->payment_due); ?></td>
                                        <td><?php echo html_escape($que->payment_date); ?></td>
                                        <td><?php echo html_escape($que->paid_by); ?></td>
                                        <td class="center">
                                        <?php if($this->permission->method('hrm','update')->access()): ?> 
                                       <?php 
                                        if($que->payment_due =='paid'){
                                            echo '<a href="#" class="btn btn-secondary">Paid</a>';        
                                        } 
                                        else {?>
                                          
                                            <a href='#' class='btn btn-xs btn-success btn-s' onclick='Payment(<?php echo html_escape($que->emp_sal_pay_id); ?>,"<?php echo html_escape($que->employee_id); ?>","<?php echo html_escape($que->total_salary); ?>","<?php echo html_escape($que->total_working_minutes); ?>","<?php echo html_escape($que->working_period); ?>")'><?php echo display('pay_now') ?>Pay Now</a>
                                      <?php  }

                                        ?>
                                         <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/employe-payment-delete/".html_escape($que->emp_sal_pay_id)) ?>" class="btn btn-xs btn-danger" title="Delete "><i class="ti-trash"></i></a>
                                        <?php endif; ?> 
                                    </td>
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
     <div id="PaymentMOdal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><center> <?php echo display('payment')?></center></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
           
   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-heading">
                        <h4><?php echo display('payment_form')?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/Employees/payconfirm/'. (!empty($data->emp_sal_pay_id)?$data->emp_sal_pay_id:null)) ?>
                

                    <input name="emp_sal_pay_id" id="salType" type="hidden" value="">
                 
                         <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('employee') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="empname" class="form-control" id="employee_name" value="" readonly>
                                <input type="hidden" name="employee_id" class="form-control" id="employee_id" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_salary" class="col-sm-3 col-form-label"><?php echo display('total_salary') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="total_salary" class="form-control" id="total_salary" value="" readonly>
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="total_working_minutes" class="col-sm-3 col-form-label"><?php echo display('total_working_minutes') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="total_working_minutes" class="form-control" id="total_working_minutes" value="" readonly>
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="working_period" class="col-sm-3 col-form-label"><?php echo display('working_period') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="working_period" class="form-control" id="working_period" value="" readonly>
                            </div>
                        </div> 
                        <input type="hidden" name="finyear" id="finyear">
                    
               <div class="form-group text-center">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">&times; Cancel</button>
                            <button type="submit" class="btn btn-primary"><?php echo display('confirm')?></button>
                        </div>

                    <?php echo form_close() ?>


                </div>  
            </div>
        </div>
    </div>
             
    </div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
</div>
 
<script src="<?php echo MOD_URL.$module;?>/assets/js/paymentView.js"></script>
