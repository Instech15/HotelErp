 <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/holiday-update/'. $data->payrl_holi_id) ?>
                

                    <input name="payrl_holi_id" type="hidden" value="<?php echo html_escape($data->payrl_holi_id) ?>">
                 
                         <div class="form-group row">
                            <label for="holiday_name" class="col-sm-3 col-form-label"><?php echo display('holiday_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="holiday_name" class="form-control" id="holiday_name" value="<?php echo html_escape($data->holiday_name)?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-sm-3 col-form-label"><?php echo display('start_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="start_date" class="datepickerwithoutprevdate form-control" id="start_date" value="<?php echo html_escape($data->start_date)?>">
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="end_date" class="col-sm-3 col-form-label"><?php echo display('end_date') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="end_date" id="end_date" class="datepickerwithoutprevdates form-control" value="<?php echo html_escape($data->end_date)?>">
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="no_of_days" class="col-sm-3 col-form-label"><?php echo display('no_of_days') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="no_of_days" class="form-control" id="no_of_days" value="<?php echo html_escape($data->no_of_days)?>" autocomplete="off">
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
    <script src="<?php echo MOD_URL.$module;?>/assets/js/updateHolidayFrom.js"></script>