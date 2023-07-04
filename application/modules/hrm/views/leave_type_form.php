<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
        <div class="card-header"><h4><?php echo display('leave_type') ?><small class="float-right"><?php if($this->permission->method('hrm','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md" data-target="#add" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
<?php echo display('add_leave_type');?></button> 
<?php endif; ?></small></h4></div>
            <div class="card-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th><?php echo display('id') ?></th>
                        <th><?php echo display('type_name') ?></th>
                        <th><?php echo display('total_leave_days') ?></th>
                        <th><?php echo display('action') ?></th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($type)) { ?>
                            
                            <?php $sl=0;
							foreach ($type as $row) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo html_escape($row->leave_type_id);?></td>
                                    <td><?php echo html_escape($row->leave_type); ?></td>
                                    <td><?php echo html_escape($row->leave_days); ?></td>
                                    <td>
                                        <?php if($this->permission->method('hrm','update')->access()): ?>
                                        <a href="<?php echo base_url("hrm/leave/update_leave_type/".html_escape($row->leave_type_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                        <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?>  
                                        <a href="<?php echo base_url("hrm/leave/delete_leave_type/".html_escape($row->leave_type_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-close"></i></a>
                                         <?php endif; ?>
                                    </td>
                
                                </tr>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>

<!-- add leave type modal -->
 <div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><strong><?php echo display('add_leave_type_form') ?></strong></center>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               
    
   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
           
                <div class="card-body">

                <?php echo form_open('hrm/leave/add_leave_type') ?>

                    <div class="form-group row">
                        <label for="leave_type" class="col-sm-3 col-form-label"><?php echo display('leave_type') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="leave_type" class="form-control" type="text" placeholder="<?php echo display('type_name') ?>" id="leave_type"  required >
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="leave_type" class="col-sm-3 col-form-label"><?php echo display('number_of_leave_days') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="leave_days" class="form-control" type="number" placeholder="<?php echo display('number_of_leave_days') ?>" id="leave_days"  required >
                        </div>
                    </div> 
                     
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
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