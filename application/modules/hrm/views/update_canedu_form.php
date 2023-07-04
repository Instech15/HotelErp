<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-heading">
                <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            </div>
            <div class="card-body">
                <?php echo form_open('hrm/Candidate/update_can_eduifo_form/'. $data->can_id) ?>
                
                
                
                <input type="hidden" name="can_id" class="form-control"  placeholder="<?php echo display('can_id') ?>" id="can_id" value="<?php echo html_escape($data->can_id) ?>">
                
                <?php if (!empty($edu)) { ?>
                <?php
                foreach ($edu as $upedu) {?>
                <div class="form-group row">
                    <label for="degree_name" class="col-sm-3 col-form-label"><?php echo display('degree_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="degree_name[]" class="form-control"  placeholder="<?php echo display('degree_name') ?>" id="degree_name" value="<?php echo html_escape($upedu->degree_name) ?>"  >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="university_name" class="col-sm-3 col-form-label"><?php echo display('university_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="university_name[]" class="form-control"  placeholder="<?php echo display('university_name') ?>" id="university_name"  value="<?php echo html_escape($upedu->university_name) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cgp" class="col-sm-3 col-form-label"><?php echo display('cgp') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="cgp[]" class="form-control"  placeholder="<?php echo display('cgp') ?>" id="cgp"  value="<?php echo html_escape($upedu->cgp) ?>" >
                    </div>
                </div>
                
                <?php
                }?>
                <?php
                }?>
                
                <div class="form-group row">
                    <label for="comments" class="col-sm-3 col-form-label"><?php echo display('comments') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea  name="comments" class="form-control"  placeholder="<?php echo display('comments') ?>" id="comments" ><?php echo html_escape($upedu->comments) ?></textarea>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>