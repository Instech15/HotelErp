<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
                    <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            <div class="card-body">
                <?php echo form_open_multipart("profile-setting") ?>
                    
                    <?php echo form_hidden('id',$user->id) ?>
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-3 col-form-label"><?php echo display('firstname') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="firstname" class="form-control" type="text" placeholder="First Name" id="firstname"  value="<?php echo html_escape($user->firstname) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label"><?php echo display('lastname') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="lastname" class="form-control" type="text" placeholder="Last Name" id="lastname" value="<?php echo html_escape($user->lastname) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label"><?php echo display('email') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="email" class="form-control" type="text" placeholder="Email Address" id="email" value="<?php echo html_escape($user->email) ?>">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"><?php echo display('password') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="password" class="form-control" type="password" placeholder="Password" id="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="about" class="col-sm-3 col-form-label"><?php echo display('about') ?></label>
                        <div class="col-sm-9">
                            <textarea name="about" placeholder="About" class="form-control" id="about"><?php echo html_escape($user->about) ?></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="preview" class="col-sm-3 col-form-label"><?php echo display('preview') ?></label>
                        <div class="col-sm-9">
                            <img src="<?php echo html_escape(base_url(!empty($user->image)?$user->image: "assets/img/user/user.png")) ?>" class="img-thumbnail" width="125" height="100">
                        </div>
                        <input type="hidden" name="old_image" value="<?php echo html_escape($user->image) ?>">
                    </div> 

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label"><?php echo display('image') ?></label>
                        <div class="col-sm-9">
                            <input type="file" name="image" id="image" aria-describedby="fileHelp">
                            <small id="fileHelp" class="text-muted"></small>
                        </div>
                    </div> 
         
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>

 