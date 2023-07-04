 
  
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open_multipart('hrm/Candidate/create_can_eduinfo') ?>
                        <div class="form-group row">
                            <label for="pos_id" class="col-sm-3 col-form-label"><?php echo display('pos_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                            <?php 
                            echo form_dropdown('can_id', $dropdown_edu, null, 'class="form-control"');
                            ?> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="degree_name" class="col-sm-3 col-form-label"><?php echo display('degree_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="degree_name" class="form-control"  placeholder="<?php echo display('degree_name') ?>" id="degree_name"  >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="university_name" class="col-sm-3 col-form-label"><?php echo display('university_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="university_name" class="form-control"  placeholder="<?php echo display('university_name') ?>" id="university_name">
                            </div>
                        </div> 
                          <div class="form-group row">
                            <label for="cgp" class="col-sm-3 col-form-label"><?php echo display('cgp') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="cgp" class="form-control"  placeholder="<?php echo display('cgp') ?>" id="cgp" >
                            </div>
                        </div> 

                          <div class="form-group row">
                            <label for="comments" class="col-sm-3 col-form-label"><?php echo display('comments') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea  name="comments" class="form-control"  placeholder="<?php echo display('comments') ?>" id="comments" ></textarea>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="signature" class="col-sm-3 col-form-label"><?php echo display('signature') ?> <span class="text-danger">*</span>/label>
                            <div class="col-sm-9">
                                <input type="file" name=" signature" class="form-control"  placeholder="<?php echo display('signature') ?>" id="signature">
                            </div>
                        </div> 
                      

                        
     
             
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('send') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>
     