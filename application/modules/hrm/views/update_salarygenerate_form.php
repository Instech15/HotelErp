 
  
    
  
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">
                <?php echo form_open('hrm/salary-generate-update/'. $data->ssg_id) ?>

                    <input name="ssg_id" type="hidden" value="<?php echo html_escape($data->ssg_id) ?>">
                 
                      

                       <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="<?php echo display('name') ?>" id="name" value="<?php echo  html_escape($data->name)?>">
                         
                        
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"><?php echo display('start_date') ?></label>
                            <div class="col-sm-9">
                            <input type="text" class="datepickers form-control" name="start_date" placeholder="<?php echo display('start_date') ?>" id="start_date"  value="<?php echo  html_escape($data->start_date)?>">
                         
                        
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"><?php echo display('end_date') ?> </label>
                            <div class="col-sm-9">
                            <input type="text" class="datepickers form-control" name="end_date" placeholder="<?php echo display('end_date') ?>" id="end_date" value="<?php echo  html_escape($data->end_date)?>">
                         
                        
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
    