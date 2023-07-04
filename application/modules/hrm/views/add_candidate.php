<div id="tabs">
  <ul>
  <li><img src="<?php echo base_url('assets/img/user/us.png') ?>" height="150px" width="100%" ></li>
    <li><a href="#tabs-1"><?php echo display('personal_information')?></a></li>
    <li><a href="#tabs-2"><?php echo display('educational_information')?></a></li>
    <li><a href="#tabs-3"><?php echo display('past_experience')?></a></li>
  </ul>
  <div id="tabs-1">
     <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open_multipart('hrm/new-candidate') ?>
                     
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-2 col-form-label"><?php echo display('first_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" id="first_name">
                            </div>
                             <label for="last_name" class="col-sm-2 col-form-label"><?php echo display('last_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" id="last_name">
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"><?php echo display('email') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email">
                            </div>
                            <label for="picture" class="col-sm-2 col-form-label"><?php echo display('picture') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="file" name=" picture" class="form-control"  placeholder="<?php echo display('picture') ?>" id="picture">
                            </div>
                        </div>
                      
                        
              <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('submit') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>


  </div>
 