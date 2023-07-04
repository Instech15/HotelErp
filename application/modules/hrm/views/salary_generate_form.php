     <div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('salary_generate') ?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
         
            <div class="card-body">

            <?php echo form_open('hrm/salary-generate') ?>
                    
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="<?php echo display('name') ?>" id="name">                       
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"><?php echo display('start_date') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="datepickers form-control" name="start_date" placeholder="<?php echo display('s_date') ?>" id="start_date">
                         
                        
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"><?php echo display('end_date') ?> </label>
                            <div class="col-sm-9">
                            <input type="text" class="datepickers form-control" name="end_date" placeholder="<?php echo display('e_date') ?>" id="end_date">
                         
                        
                            </div>
                            </div>

                          
                            
                            
             
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('generate') ?></button>
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
			<div class="card-header"><h4><?php echo display('salary_generate') ?> <small class="float-right"><?php if($this->permission->method('hrm','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
<?php echo display('generate_now')?></button> 
<?php endif; ?>
<?php if($this->permission->method('hrm','read')->access()): ?>
<a href="<?php echo base_url();?>hrm/manage-salary-generate" class="btn btn-primary mb-2"><?php echo display('manage_salary_generate')?></a>
<?php endif; ?></small></h4></div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th><th><?php echo display('employee_name') ?></th>
                                <th><?php echo display('employee_id') ?></th>
                                <th><?php echo display('name') ?></th>
                                <th><?php echo display('gdate') ?></th>
                                <th><?php echo display('start_dates') ?></th>
                                <th><?php echo display('e_date') ?></th>
                                <th><?php echo display('generate_by') ?></th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($salgen)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($salgen as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td> 
                                    <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                                    <td><?php echo html_escape($que->employee_id); ?></td>
                                    <td><?php echo html_escape($que->name); ?></td>
                                    <td><?php echo html_escape($que->gdate); ?></td>
                                    <td><?php echo html_escape($que->start_date); ?></td>
                                    <td><?php echo html_escape($que->end_date); ?></td>
                                    <td><?php echo html_escape($que->generate_by); ?></td>
                                                                
                                   
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
<script src="<?php echo MOD_URL.$module;?>/assets/js/awardForm.js"></script>

 