<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="card">
           <div class="card-header"><h4><?php echo display('loan_installment_list') ?></h4></div> 
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('employee_id') ?></th>
                            <th><?php echo display('loan_id') ?></th>
                            <th><?php echo display('installment_amount') ?></th>
                            <th><?php echo display('payment') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('received_by') ?></th>
                            <th><?php echo display('installment_no') ?></th>
                            <th><?php echo display('notes') ?></th>
                             </th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($loanss)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($loanss as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                                    <td><?php echo html_escape($que->employee_id); ?></td>
                                    <td><?php echo html_escape($que->loan_id); ?></td>
                                    <td><?php echo html_escape($que->installment_amount); ?>$</td>
                                    <td><?php echo html_escape($que->payment); ?>$</td>
                                    <td><?php echo html_escape($que->date); ?></td>
                                    <td><?php echo html_escape($que->receiver); ?></td>
                                    <td><?php echo html_escape($que->installment_no); ?></td>
                                    <td><?php echo html_escape($que->notes); ?></td>
                                    

                                   
                                <td class="center">
                                <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/loan-installment-update/".html_escape($que->loan_inst_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                         <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/loan-installment-delete/".html_escape($que->loan_inst_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a> 
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
</div>
 
 