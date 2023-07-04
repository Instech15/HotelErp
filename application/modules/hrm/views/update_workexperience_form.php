 <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-bd lobidrag">
                <div class="card-heading">
                    <div class="card-title">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                    </div>
                </div>
                <div class="card-body">
                <?php echo form_open_multipart('hrm/Candidate/update_workexperience_form/'. $data->can_id) ?>

                 
                 
                      
    <input type="hidden" name="can_id" value="<?php echo html_escape($data->can_id) ?>">
                     
<?php if (!empty($work)) { ?>
<?php 
foreach ($work as $wrk) {?>
                            
                        <div class="form-group row">
                            <label for="company_name" class="col-sm-3 col-form-label"><?php echo display('company_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="company_name[]" class="form-control"  placeholder="<?php echo display('company_name') ?>" id="company_name"  value="<?php echo html_escape($wrk->company_name) ?>" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="working_period" class="col-sm-3 col-form-label"><?php echo display('working_period') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <input type="text" name="working_period[]" class="  daterange form-control"  placeholder="<?php echo display('working_period') ?>" id="working_period"  value="<?php echo html_escape($wrk->working_period) ?>">
                            </div>
                        </div> 
                          <div class="form-group row">
                            <label for="duties" class="col-sm-3 col-form-label"><?php echo display('duties') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="duties[]" class="form-control"  placeholder="<?php echo display('duties') ?>" id="duties"   value="<?php echo html_escape($wrk->duties) ?>">
                            </div>
                        </div> 

                          <div class="form-group row">
                            <label for="supervisor" class="col-sm-3 col-form-label"><?php echo display('supervisor') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text"  name="supervisor[]" class="form-control"  placeholder="<?php echo display('supervisor') ?>" id="supervisor"   value="<?php echo html_escape($wrk->supervisor) ?>">
                            </div>
                        </div> 
                         <?php      
                  }?>
                  <?php      
                  }?>
             
                        <div class="form-group text-right">
                            
                            <button type="save" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>

                    <?php echo form_close() ?>


                </div>  
            </div>
        </div>
    </div>
    