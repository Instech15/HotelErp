    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?><small class="float-right"><?php if($this->permission->method('hrm','read')->access()): ?> 
<a href="<?php echo base_url();?>hrm/manage-interview" class="btn btn-primary"><?php echo display('manage_interview') ?></a>
<?php endif; ?></small></h4>
                </div>
                <div class="card-body">
                <?php echo form_open_multipart('hrm/interview-update/'. $data->can_int_id) ?>
                    <input name="can_int_id" type="hidden" value="<?php echo html_escape($data->can_int_id) ?>">

                          <div class="form-group row">
                            <label for="can_id" class="col-sm-2 col-form-label"><?php echo display('candidate_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                              
                                <?php echo form_dropdown('can_id', $dropdowninterview, (!empty($data->can_id )?$data->can_id :null), ' class="form-control" onchange="SelectToLoad(this.value)" id="c_id"') ?>
                            </div>
                             <label for="job_adv_id" class="col-sm-2 col-form-label"><?php echo display('job_adv_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="position_name" class="form-control" placeholder="<?php echo display('position')?>" value="<?php echo html_escape((!empty($data->position_name)?$data->position_name:null));?>" readonly>
               <input type="hidden" name="job_adv_id" class="form-control" value="<?php echo html_escape($data->job_adv_id)?>">
                            </div>
                        </div>
                       
                          <div class="form-group row">
                            <label for="interview_date" class="col-sm-2 col-form-label"><?php echo display('interview_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="interview_date" class="datepickers form-control"  placeholder="<?php echo display('interview_date') ?>" id="interview_date" value="<?php echo html_escape($data->interview_date)?>">
                            </div>
                            <label for="interviewer_id" class="col-sm-2 col-form-label"><?php echo display('interviewer_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="interviewer_id" class="form-control"  placeholder="<?php echo display('interviewer_id') ?>" id="interviewer_id" value="<?php echo html_escape($data->interviewer_id) ; ?>" >
                            </div>
                        </div> 

                      
                        <div class="form-group row">
                            <label for="interview_marks" class="col-sm-2 col-form-label"><?php echo display('interview_marks') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="interview_marks" class="txt form-control"  placeholder="<?php echo display('interview_marks') ?>" id="interview_marks" value="<?php echo html_escape($data->interview_marks)?>" >
                            </div>
                            <label for="written_total_marks" class="col-sm-2 col-form-label"><?php echo display('written_total_marks') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="written_total_marks" class="txt form-control"  placeholder="<?php echo display('written_total_marks') ?>" id="written_total_marks" value="<?php echo html_escape($data->written_total_marks)?>">
                            </div>
                        </div> 
        
                        

                      <div class="form-group row">
                            <label for="mcq_total_marks" class="col-sm-2 col-form-label"><?php echo display('mcq_total_marks') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="mcq_total_marks" class="txt form-control"  placeholder="<?php echo display('mcq_total_marks') ?>" id="mcq_total_marks"  value="<?php echo html_escape($data->mcq_total_marks) ; ?>">
                            </div>
                            <label for="total_marks" class="col-sm-2 col-form-label"><?php echo display('total_marks') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="total_marks" class=" form-control"  placeholder="<?php echo display('total_marks') ?>" id="total_marks"  value="<?php echo html_escape($data->total_marks) ; ?>">
                            </div>
                        </div>
                         
                        <div class="form-group row">
                            <label for="recommandation" class="col-sm-2 col-form-label"><?php echo display('recommandation') ?></label>
                            <div class="col-sm-4">
                                <input type="text" name="recommandation" class="form-control"  placeholder="<?php echo display('recommandation') ?>" id="recommandation" value="<?php echo html_escape($data->recommandation)?>" >
                            </div>
                            <label for="selection" class="col-sm-2 col-form-label"><?php echo display('selection') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                
                                <select name="selection" class="form-control width_260px"  placeholder="<?php echo display('selection') ?>" id="selection"  >
                                    <option value=""><?php echo display('selection_type') ?></option>
                                    <option value="ok" <?php  if($data->selection=='ok'){
                                        echo display('selected');
                                    } ?>><?php echo display('selected') ?></option>
                                    <option value="No" <?php  if($data->selection=='No'){
                                        echo display('selected');
                                    } ?>><?php echo display('deselected') ?></option>

                                </select>
                            </div>
                        </div> 
        
                        
                        <div class="form-group row">
                            <label for="details" class="col-sm-2 col-form-label"><?php echo display('details') ?></label>
                            <div class="col-sm-10">
                                <textarea name="details" class="form-control"  placeholder="<?php echo display('details') ?>" id="details" ><?php echo html_escape($data->details)?></textarea>
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
             
         
    <script src="<?php echo MOD_URL.$module;?>/assets/js/interviewForm.js"></script>