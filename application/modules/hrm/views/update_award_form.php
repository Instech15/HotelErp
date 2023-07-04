  <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/award-update/'. $data->award_id) ?>
                

                    <input name="award_id" type="hidden" value="<?php echo html_escape($data->award_id) ?>">
                  <div class="form-group row">
                           
                            <label for="award_name" class="col-sm-3 col-form-label">
                            <?php echo display('award_name') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                           <input type="text" name="award_name" class=" form-control" value="<?php echo html_escape($data->award_name) ?>"  autocomplete="off" required>
                               
                            </div>
                           
                        </div>
                        <div class="form-group row">
                           
                            <label for="aw_description" class="col-sm-3 col-form-label">
                            <?php echo display('aw_description') ?></label>
                            <div class="col-sm-9">
                           <textarea  name="aw_description" class=" form-control"><?php echo html_escape($data->aw_description) ?></textarea>
                               
                            </div>
                           
                        </div>
                         <div class="form-group row">
                           
                            <label for="awr_gift_item" class="col-sm-3 col-form-label">
                            <?php echo display('awr_gift_item') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                           <input type="text" name="awr_gift_item" class=" form-control" id="awr_gift_item" value="<?php echo html_escape($data->awr_gift_item) ?>"  autocomplete="off" required>
                               
                            </div>
                           
                        </div>
                     
                         <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label">
                            <?php echo display('date') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                           <input type="text" name="date" class="datepickers form-control" value="<?php echo html_escape($data->date) ?>" required>
                               
                            </div>
                            </div>
                         <div class="form-group row">
                           
                            <label for="employee_id" class="col-sm-3 col-form-label" >
                            <?php echo display('employee_id') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                    <?php
                      $value= $bb['employee_id'];
                    echo form_dropdown('employee_id', $dropdown, $value, 'class="form-control" required=""');
                    ?>
                               
                            </div>
                           
                        </div>
                        <div class="form-group row">
                           
                            <label for="awarded_by" class="col-sm-3 col-form-label">
                            <?php echo display('awarded_by') ?><span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                           <input type="text" name="awarded_by" class=" form-control" value="<?php echo html_escape($data->awarded_by) ?>"  autocomplete="off" required>
                               
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


     
    <script src="<?php echo MOD_URL.$module;?>/assets/js/awardForm.js"></script>
