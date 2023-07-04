<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 

            <div class="card-body">
                
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('cid') ?></th>
                            <th><?php echo display('emp_sal_name') ?></th>
                            <th><?php echo display('emp_sal_type') ?></th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_sl)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($emp_sl as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->emp_sal_name); ?></td>
                                    <td><?php echo html_escape($que->emp_sal_type); ?></td>                            
                                    <td class="center">
                                    <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/Employees/update_salsetup_form/".html_escape($que->emp_sal_set_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                         <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/Employees/delete_emp_salarysetup/".html_escape($que->emp_sal_set_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a> 
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
 
 