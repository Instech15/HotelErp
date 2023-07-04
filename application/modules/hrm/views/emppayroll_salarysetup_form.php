    <div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('salary_type') ?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
           

        <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card"> 

            <div class="card-body">

            <?php echo form_open('hrm/salary-type-setup') ?>
                        <div class="form-group row">
                            <label for="salary_type" class="col-sm-3 col-form-label"><?php echo display('salary_type') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="sal_name" class="form-control" type="text" placeholder="<?php echo display('salary_type') ?>" id="sal_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_sal_type" class="col-sm-3 col-form-label"><?php echo display('salary_benefits_type') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="emp_sal_type" class="form-control"  placeholder="<?php echo display('salary_benefits_type') ?>" id="emp_sal_type">
                           <option value="1">Add</option>
                           <option value="0">Deduct</option>
                                </select>
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
            <div class="modal-footer">

            </div>

        </div>

    </div>
    <div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
			<div class="card-header"><h4><?php echo display('salary_type_setup') ?> <small class="float-right"><?php if($this->permission->method('hrm','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
<?php echo display('add_salary_type') ?></button> 
  <?php endif; ?>
  <?php if($this->permission->method('hrm','read')->access()): ?>
<a href="<?php echo base_url();?>hrm/manage-salary-type-setup" class="btn btn-primary mb-2"><?php echo display('manage_salary_type')?></a>
  <?php endif; ?></small></h4></div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('salary_type') ?></th>
                            <th><?php echo display('benefit_type') ?></th>
                             
                          
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
                                        echo display('ad');
                                    }else{
                                        echo display('deduct');
                                    }
                                    ?></td>                    
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
 
 