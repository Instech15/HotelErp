<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
        <div class="card-header">
        <h4><?php echo display('loan_view_list') ?></h4>
                </div> 
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('permission_by') ?></th>
                             <th><?php echo display('loan_no') ?></th>  
                            <th><?php echo display('loan_details') ?></th>
                            <th><?php echo display('amount') ?></th>
                            <th><?php echo display('interest_rate') ?></th>
                            <th><?php echo display('installment_period') ?></th>
                            <th><?php echo display('repayment_amount') ?></th>
                            <th><?php echo display('date_of_approve') ?></th>
                            <th><?php echo display('repayment_start_date') ?></th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($loan)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($loan as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                                    <td><?php echo html_escape($que->Pname); ?></td>
                                    <td><?php echo html_escape($que->loan_id); ?></td>
                                    <td><?php echo html_escape($que->loan_details); ?></td>
                                    <td><?php echo html_escape($que->amount); ?>$</td>
                                    <td><?php echo html_escape($que->interest_rate); ?>%</td>
                                    <td><?php echo html_escape($que->installment_period); ?>Month</td>
                                    <td><?php echo html_escape($que->repayment_amount); ?>$</td>
                                    <td><?php echo html_escape($que->date_of_approve); ?></td>
                                    <td><?php echo html_escape($que->repayment_start_date); ?></td>

                                   
                                    <td class="center">
                                     <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo html_escape(base_url("hrm/grant-loan-update/$que->loan_id")) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                        <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access() && $que->loan_status != 1): ?> 
                                        <a href="<?php echo html_escape(base_url("hrm/grant-loan-delete/$que->loan_id")) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a> 
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
 
 