 <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header"><h4><?php echo display('update_application') ?></h4></div> 
                <div class="card-body">

                <?php echo form_open_multipart('hrm/leave-application-update/'. $data->leave_appl_id) ?>
                

                    <input name="leave_appl_id" type="hidden" value="<?php echo html_escape($data->leave_appl_id) ?>">
                      
                        <div class="form-group row">
                            <label for="employee_id" class="col-sm-2 col-form-label"><?php echo display('select') ?> <?php echo display('employee_name') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                         
                            <?php  if($this->session->userdata('isAdmin')==1 || $this->session->userdata('supervisor')==1){?> 

                            <?php  $value= $bb['employee_id'];
                             echo form_dropdown('employee_id',$dropdown,$value,'class="form-control width_100" id="employee_id"') ?>
                              <?php }else{?> 
                                <input type="text" name="employee_name" class="form-control" value="<?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?>" readonly>
                                 <input type="hidden" name="employee_id" class="form-control" value="<?php echo $this->session->userdata('employee_id');?>">
                               <?php }?>
                               
                            </div> <label for="leave_type" class="col-sm-2 col-form-label"><?php echo display('select') ?> <?php echo display('leave_type') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                            <?php echo form_dropdown('leave_type_id',$type,(!empty($data->leave_type_id)?$data->leave_type_id:null),'class="form-control width_100" onchange="leavetypechange(this.value)"') ?>
                            <span id="enjoy" class="c_green"></span><span id="checkleave" class="c_green"></span>
                            </div>
                           <input type="hidden" name="apply_date" class="form-control" id="f" value="<?php echo html_escape($data->apply_date) ?>">
                        </div>
                          <div class="form-group row">
                            <!-- for leave leave type -->
                           
                             <label for="apply_strt_date" class="col-sm-2 col-form-label">
                            <?php echo display('apply_strt_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                           <input type="text" name="apply_strt_date" class="datepickers form-control apply_start" id="apply_start" placeholder="<?php echo display('apply_strt_date') ?>" value="<?php echo html_escape($data->apply_strt_date) ?>">
                            </div>
                             <label for="apply_end_date" class="col-sm-2 col-form-label">
                            <?php echo display('apply_end_date') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                           <input type="text" name="apply_end_date" class="datepickers form-control apply_end" id="apply_end" value="<?php echo html_escape($data->apply_end_date) ?>" placeholder="<?php echo display('apply_end_date') ?>">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="apply_day" class="col-sm-2 col-form-label">
                            <?php echo display('apply_day') ?> </label>
                            <div class="col-sm-4">
                           <input type="text" name="apply_day" class="form-control apply_day" id="apply_day" value="<?php echo html_escape($data->apply_day) ?>" placeholder="<?php echo display('apply_day') ?>" readonly>
                            </div>
                               <label for="apply_hard_copy" class="col-sm-2 col-form-label">
                            <?php echo display('apply_hard_copy') ?></label>
                            <div class="col-sm-4">
                           <input type="file" name="apply_hard_copy" class="form-control">
                             <input type="hidden" name="old_apply_hard_copy"  value="<?php echo html_escape($data->apply_hard_copy) ?>" class="form-control">   
                            </div>
                        </div>
                         <?php  if($this->session->userdata('isAdmin')==1 || $this->session->userdata('supervisor')==1){?> 
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">
                            <?php echo display('leave_aprv_strt_date') ?></label>
                            <div class="col-sm-4">
                           <input type="text" name="leave_aprv_strt_date" class="datepickers form-control leave_aprv_strt_date" value="<?php echo html_escape($data->leave_aprv_strt_date) ?>" id="leave_aprv_strt_date" placeholder="<?php echo display('leave_aprv_strt_date') ?>">
                               
                            </div>
                             <label for="" class="col-sm-2 col-form-label">
                            <?php echo display('leave_aprv_end_date') ?></label>
                            <div class="col-sm-4">
                           <input type="text" name="leave_aprv_end_date" class="datepickers form-control leave_aprv_end_date" value="<?php echo html_escape($data->leave_aprv_end_date) ?>" id="leave_aprv_end_date" placeholder="<?php echo display('leave_aprv_end_date') ?>">
                               
                            </div>
                             </div>
                        <div class="form-group row">
                            <label for="num_aprv_day" class="col-sm-2 col-form-label">
                            <?php echo display('num_aprv_day') ?></label>
                            <div class="col-sm-4">
                           <input type="text" name="num_aprv_day" class="form-control num_aprv_day" placeholder="<?php echo display('num_aprv_day') ?>" value="<?php echo html_escape($data->num_aprv_day) ?>" readonly>
                               
                            </div>
                             <label for="approved_by" class="col-sm-2 col-form-label">
                            <?php echo display('approved_by') ?></label>
                            <div class="col-sm-4">
                                <select name="approved_by" class="form-control width_100">
                                    <option value=""><?php echo display('select') ?></option>
                                    <?php foreach($supr as $supervisor){?>
                                    <option value="<?php echo html_escape($supervisor->employee_id);?>" <?php if($data->approved_by == $supervisor->employee_id){
                                        echo display('selected');
                                    }else{
                                        echo '';
                                    } ?>><?php echo html_escape($supervisor->first_name.' '.$supervisor->last_name);?></option>
                                    <?php } ?>
                                </select>
                               
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group row">
                          
                            <label for="reason" class="col-sm-2 col-form-label"><?php echo display('reason') ?></label>
                            <div class="col-sm-10">
                                <textarea name="reason" class="form-control" placeholder="<?php echo display('reason') ?>"><?php echo html_escape($data->reason);?></textarea>
                            </div>
                        </div>
                       <div class="form-group row">
                            <div class="col-sm-4">
                             <input type="hidden" name="approve_date" class="form-control"  value="<?php echo date('Y-m-d')?>" >
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>
<input type="hidden" id="apweek" value="<?php echo html_escape($weekend) ?>">
<script src="<?php echo MOD_URL.$module;?>/assets/js/updateApplicationForm.js"></script>
