 <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="card">
              <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?> <?php echo display('short_list') ?></h4>
                </div>
              <div class="card-body">

                <?php echo form_open_multipart('hrm/shortlist-update/'. $data->can_short_id) ?>
                

                    <input name="can_short_id" type="hidden" value="<?php echo html_escape($data->can_short_id) ?>">
                 
                        <div class="form-group row">
                            <label for="can_id" class="col-sm-3 col-form-label"><?php echo display('candidate_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                               
                                <?php echo form_dropdown('can_id', $canlist, (!empty($data->can_id)?$data->can_id:null), ' class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_adv_id" class="col-sm-3 col-form-label"><?php echo display('job_adv_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <?php echo form_dropdown('job_adv_id', $dropdown, (!empty($data->job_adv_id)?$data->job_adv_id:null), ' class="form-control"') ?>
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="date_of_shortlist" class="col-sm-3 col-form-label"><?php echo display('date_of_shortlist') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="date_of_shortlist" class="datepickers form-control" id="date_of_shortlist" value="<?php echo html_escape($data->date_of_shortlist)?>">
                            </div>
                        </div> 
                       <div class="form-group row">
                            <label for="interview_date" class="col-sm-3 col-form-label"><?php echo display('interview_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="interview_date" class="datepickers form-control" id="interview_date" value="<?php echo html_escape($data->interview_date)?>">
                            </div>
                        </div> 
                       <div class="form-group row text-right">
                            <label for="interview_date" class="col-sm-3 col-form-label"><span class="text-danger"></span></label>
                            <div class="col-sm-6">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                            </div>
                        </div> 

                    <?php echo form_close() ?>


                </div>  
            </div>
        </div>
    </div>