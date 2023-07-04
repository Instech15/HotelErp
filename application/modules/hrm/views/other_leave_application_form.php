<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
<div class="card-header"><h4><?php echo display('leave_application') ?><small class="float-right"><?php if($this->permission->method('hrm','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md mb-2" data-target="#add" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
<?php echo display('others_leave_application');?></button> 
<?php endif; ?>
<?php if($this->permission->method('hrm','read')->access()): ?>
<a href="<?php echo base_url();?>hrm/manage-leave-application" class="btn btn-primary mb-2"><?php echo display('manage_application');?></a>
<?php endif; ?></small></h4></div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th><?php echo display('sl') ?></th>
                        <th><?php echo display('name') ?></th>
                        <th><?php echo display('leave_type') ?></th>
                        <th><?php echo display('apply_strt_date') ?></th>
                        <th><?php echo display('apply_end_date') ?></th>
                        <th><?php echo display('leave_aprv_strt_date') ?></th>
                        <th><?php echo display('leave_aprv_end_date') ?></th>
                        <th><?php echo display('apply_day') ?></th>
                        <th><?php echo display('num_aprv_day') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mang)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($mang as $row) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo html_escape($row->first_name.' '.$row->last_name)?></td>
                                <td><?php echo html_escape($row->leave_type); ?></td>
                                <td><?php echo html_escape($row->apply_strt_date); ?></td>
                                <td><?php echo html_escape($row->apply_end_date); ?></td>
                                <td><?php echo html_escape($row->leave_aprv_strt_date); ?></td>
                                <td><?php echo html_escape($row->leave_aprv_end_date); ?></td> 
                                <td><?php echo html_escape($row->apply_day); ?></td>
                                <td><?php echo html_escape($row->num_aprv_day); ?></td>
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
 
 
 <div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><strong><?php echo display('leave_application_form') ?></strong></center>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               
    
   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                
                <div class="card-body">

                <?php echo form_open_multipart('hrm/leave-application') ?>
                   
                      
                        <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('select') ?> <?php echo display('employee_name') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                         
                            <?php  if($this->session->userdata('isAdmin')==1 || $this->session->userdata('supervisor')==1){?> 
                            <?php echo form_dropdown('employee_id',$dropdown,null,'class="form-control width_100" id="employee_id"') ?>
                              <?php }else{?> 
                                <input type="text" name="employee_name" class="form-control" value="<?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?>" readonly>
                                 <input type="hidden" name="employee_id" id="employee_id" class="form-control" value="<?php echo $this->session->userdata('employee_id');?>">
                               <?php }?>
                               
                            </div> <label for="leave_type" class="col-sm-3 col-form-label"><?php echo display('select') ?> <?php echo display('leave_type') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                            <?php echo form_dropdown('leave_type_id',$type,null,'class="form-control width_100" onchange="leavetypechange(this.value)"') ?>
                            <span id="enjoy" class="c_red"></span><span id="checkleave" class="c_green"></span>
                            </div>
                           <input type="hidden" name="apply_date" class="form-control" id="f" value="<?php echo date('Y-m-d')?>">
                        </div>
                          <div class="form-group row">
                            <!-- for leave leave type -->
                           
                             <label for="apply_strt_date" class="col-sm-3 col-form-label">
                            <?php echo display('apply_strt_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                           <input type="text" name="apply_strt_date" class="datepickerwithoutprevdate form-control apply_start" id="apply_start" placeholder="<?php echo display('apply_strt_date') ?>">
                            </div>
                             <label for="apply_end_date" class="col-sm-3 col-form-label">
                            <?php echo display('apply_end_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                           <input type="text" name="apply_end_date" class="datepickerwithoutprevdates form-control apply_end" id="apply_end" placeholder="<?php echo display('apply_end_date') ?>">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="apply_day" class="col-sm-3 col-form-label">
                            <?php echo display('apply_day') ?></label>
                            <div class="col-sm-3">
                           <input type="text" name="apply_day" class="form-control apply_day" id="apply_day" placeholder="<?php echo display('apply_day') ?>" readonly>
                            </div>
                               <label for="apply_hard_copy" class="col-sm-3 col-form-label">
                            <?php echo display('apply_hard_copy') ?></label>
                            <div class="col-sm-3">
                           <input type="file" name="apply_hard_copy" class="form-control">
                               
                            </div>
                        </div>
                         <?php  if($this->session->userdata('isAdmin')==1 || $this->session->userdata('supervisor')==1){?> 
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                            <?php echo display('leave_aprv_strt_date') ?></label>
                            <div class="col-sm-3">
                           <input type="text" name="leave_aprv_strt_date" class="datepickers form-control leave_aprv_strt_date" id="leave_aprv_strt_date" placeholder="<?php echo display('leave_aprv_strt_date') ?>">
                               
                            </div>
                             <label for="" class="col-sm-3 col-form-label">
                            <?php echo display('leave_aprv_end_date') ?></label>
                            <div class="col-sm-3">
                           <input type="text" name="leave_aprv_end_date" class="datepickers form-control leave_aprv_end_date" id="leave_aprv_end_date" placeholder="<?php echo display('leave_aprv_end_date') ?>">
                               
                            </div>
                             </div>
                        <div class="form-group row">
                            <label for="num_aprv_day" class="col-sm-3 col-form-label">
                            <?php echo display('num_aprv_day') ?></label>
                            <div class="col-sm-3">
                           <input type="text" name="num_aprv_day" class="form-control num_aprv_day" placeholder="<?php echo display('num_aprv_day') ?>" readonly>
                               
                            </div>
                             <label for="approved_by" class="col-sm-3 col-form-label">
                            <?php echo display('approved_by') ?></label>
                            <div class="col-sm-3">
                                <select name="approved_by" class="form-control width_100">
                                    <option value=""><?php echo display('select_option') ?></option>
                                    <?php foreach($supr as $supervisor){?>
                                    <option value="<?php echo html_escape($supervisor->employee_id);?>"><?php echo html_escape($supervisor->first_name.' '.$supervisor->last_name);?></option>
                                    <?php } ?>
                                </select>
                               
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group row">
                          
                            <label for="reason" class="col-sm-2 col-form-label"><?php echo display('reason') ?></label>
                            <div class="col-sm-10">
                                <textarea name="reason" class="form-control" placeholder="<?php echo display('reason') ?>"></textarea>
                            </div>
                        </div>
                       <div class="form-group row">
                            <div class="col-sm-4">
                             <input type="hidden" name="approve_date" class="form-control"  value="<?php echo date('Y-m-d')?>" >
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

<input type="hidden" id="weekend" value="<?php echo html_escape($weekend) ?>">
<script src="<?php echo MOD_URL.$module;?>/assets/js/otherLeave.js"></script>

