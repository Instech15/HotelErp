<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
         <div class="card-header"><h4><?php echo display('manage_salary_setup') ?></h4></div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl') ?></th>
                            <th><?php echo display('employee_name') ?></th>
                            <th><?php echo display('employee_id') ?></th>
                            <th><?php echo display('sal_type') ?></th>
                             <th><?php echo display('setup_date') ?></th>
                           <th><?php echo display('action') ?></th>
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
                                                                
                                    <td class="center">
                                    <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/Payroll/updates_salstup_form/".html_escape($que->employee_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                        <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?>
                                        <a href="<?php echo base_url("hrm/Payroll/delete_salsetup/".html_escape($que->e_s_s_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a>
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
 
 