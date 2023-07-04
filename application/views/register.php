<?php if($this->session->userdata('UserID')==false) { ?>
<div class="section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">

                <?php if($this->session->userdata('message')) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->userdata('message'); 
						 $this->session->unset_userdata('message');
						?>
                </div>
                <?php } ?>
                <?php if ($this->session->userdata('exception')) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->userdata('exception');
						 $this->session->unset_userdata('exception');
						 ?>
                </div>
                <?php } ?>
                <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="form-wrapper m-auto">
                <div class="form-container my-4">
                    <div class="panel">
                        <div class="panel-header text-center mb-3">
                            <h3 class="fs-24"><?php echo display('signup_account') ?></h3>
                        </div>
                        <?php echo form_open('signup');?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First name"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last name"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                            <small class="form-text text-muted"><?php echo display('phone_message') ?></small>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control is-invalid" id="emial" name="emial"
                                placeholder="Enter email" required>
                            <div class="invalid-feedback"><?php echo display('enter_your_valid_email') ?></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="captcha"><?php echo $captcha_image ?></label>

                            <input type="captcha" placeholder="<?php echo display('captcha') ?>" name="captcha"
                                id="captcha" class="form-control fs-16px" autocomplete="off">
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input required type="checkbox" name="useragree" class="custom-control-input"
                                id="customCheck1">
                            <label class="custom-control-label"
                                for="customCheck1"><?php echo display('by_signing_up_you_agree') ?>
                                <a><?php echo display('terms_of_service') ?></a></label>
                        </div>
                        <button type="submit"
                            class="btn btn-primary btn-block"><?php echo display('sign_up') ?></button>
                        <p class="text-muted text-center mt-3 mb-0">
                            <?php echo display('by_signing_up_youagree_to_our') ?> <a
                                class="external"><?php echo display('terms_of_use') ?></a>.
                        </p>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else{
    $this->session->set_flashdata('exception',display('please_logout'));
    redirect('');
} ?>