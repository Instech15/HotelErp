<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
			<div class="card-header"><h4><?php echo display('salary_setup_view') ?></h4></div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('salary_type') ?></th>
                            <th><?php echo display('benefit_type') ?></th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_sl)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($emp_sl as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->sal_name); ?></td>
                                    <td><?php  $type=$que->emp_sal_type;
                                    if($type==1){
                                        echo display('add');
                                    }else{
                                        echo display("deduct");
                                    }
                                    ?></td>                            
                                    <td class="center">
                                    <?php if($this->permission->method('hrm','update')->access()): ?> 
                                  <a href="<?php echo base_url("hrm/salary-type-update/".html_escape($que->salary_type_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                         <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/Payroll/delete_salsetup/".html_escape($que->salary_type_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a> 
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
 
 