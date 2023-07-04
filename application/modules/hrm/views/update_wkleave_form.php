<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            </div>
            <div class="card-body">


                <?php echo form_open('hrm/weekly-holiday-update/'. $data->wk_id,array('method'=>'post')) ?>
                <input type="hidden" name="wk_id" value="<?php echo html_escape($data->wk_id) ?>">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo display('dayname') ?> <span
                            class="text-danger">*</span></label>


                    <div class="col-sm-3 col-form-label">

                        <input type="Checkbox" name="dayname[]" class="holidaychk" value="<?php echo display('friday') ?>"
                            <?php $text_line =$data->dayname;$text_line = explode(",",$text_line);   
                   
                   if($text_line[0] == "Friday" OR (!empty($text_line[1])?$text_line[1]:null) == "Friday"){echo display('checked');} ?> /><?php echo display('friday') ?>
                        <input type="Checkbox" class="holidaychk" name="dayname[]" value="<?php echo display('saturday') ?>"
                            <?php
                    $text_line =$data->dayname;
                    $text_line = explode(",",$text_line);
                    
                    if($text_line[0] == "Saturday" OR (!empty($text_line[1])?$text_line[1]:null) == "Saturday"){echo display('checked');}?> /><?php echo display('saturday') ?>
                        <input type="Checkbox" class="holidaychk" name="dayname[]" value="<?php echo display('sunday') ?>"
                            <?php
                    
                    $text_line =$data->dayname;
                    $text_line = explode(",",$text_line);
                    
                    if($text_line[0] == "Sunday" OR (!empty($text_line[1])?$text_line[1]:null) == "Sunday" OR (!empty($text_line[2])?$text_line[2]:null) == "Sunday"){echo display('checked');}?> /><?php echo display('sunday') ?>
                        <br>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><span class="text-danger"></span></label>


                    <div class="col-sm-3 col-form-label">
                        <div class="form-group text-right">
                            <button type="submit"
                                class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>

                    </div>
                </div>



                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>