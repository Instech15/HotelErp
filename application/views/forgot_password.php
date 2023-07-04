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
                            <h3 class="fs-24"><?php echo display('forgot_password') ?></h3>
                            <p class="text-muted text-center mb-0"><?php echo display('receover_password') ?></p>
                        </div>
                        <div class="form-group" id="main_email">
                            <label class="input-label font-weight-bold"
                                for="inputEmail"><?php echo display('y_mail') ?></label>
                            <input type="email" name="email" autocomplete="off" id="inputEmail"
                                placeholder="<?php echo display('email') ?>" required autofocus class="form-control">
                        </div>
                        <div class="mb-5" id="sent">
                            <p id="msg_email"></p>
                        </div>
                        <div class="form-group" id="sent1">
                            <label class="input-label font-weight-bold"
                                for="code"><?php echo display('enter_code') ?></label>
                            <input type="text" name="code" autocomplete="off" id="code"
                                placeholder="<?php echo display('enter_code') ?>" required autofocus
                                class="form-control">
                        </div>
                        <div class="form-group" id="new_password">
                            <label class="input-label font-weight-bold"
                                for="new_pass"><?php echo display('new_pass') ?></label>
                            <input type="password" name="new_pass" autocomplete="off" id="new_pass"
                                placeholder="<?php echo display('new_pass') ?>" required autofocus class="form-control">
                            <input type="hidden" name="hemail" autocomplete="off" id="hemail"
                                placeholder="<?php echo display('hemail') ?>" required autofocus class="form-control">
                        </div>
                        <div class="form-group">
                            <!-- capta part -->
                            <button onclick="forgot_password()" type="submit" id="email_btn"
                                class="right forgot-content forgot-custom-btn btn-success"><?php echo display('submit') ?></button>
                            <button onclick="submit_code()" type="submit" id="otp_btn"
                                class="right forgot-content forgot-custom-btn btn btn-success"><?php echo display('submit') ?></button>
                            <button onclick="reset_password()" type="submit" id="reset_btn"
                                class="right forgot-content forgot-custom-btn btn btn-success"><?php echo display('submit') ?></button>
                            <button type="submit" id="login_btn"
                                class="right forgot-content forgot-custom-btn btn btn-success"><a style="color: #fff;"
                                    href='user/login'><?php echo display('login') ?></a></button>
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
<script src="<?php echo base_url() ?>website_assets/js/forgot-password.js"></script>