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
                            <h3 class="fs-24"><?php echo display('signin_to_your_account') ?></h3>
                            <p class="text-muted text-center mb-0"><?php echo display('nice_to_see_you') ?></p>
                        </div>
                        <?php echo form_open('loginsubmit'); ?>
                        <div class="form-group">
                            <input type="email" autofocus class="form-control is-invalid" id="emial" name="email"
                                placeholder="Enter email">
                            <div class="invalid-feedback"><?php echo display('enter_your_valid_email') ?></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pass" name="password"
                                placeholder="Password">
                        </div>

                        <a href="<?php echo base_url("forgot-userpassword") ?>"><p class="text-right fs-12 text-success"><?php echo display('forgot_password') ?></p></a>
                        <button type="submit"
                            class="btn btn-primary btn-block"><?php echo display('sign_in') ?></button>
                        <?php echo form_close() ?>
                    </div>
                    <span class="facebook-span"><?php $facrbooklogn = $this->db->where('directory', 'facebook_app')->where('status', 1)->get('module')->num_rows(); if ($facrbooklogn == 1) { ?>&nbsp; <?php echo display('or')?> &nbsp;
                            <span><a class="btn btn-primary btn-sm facebook-color search text-white" href="<?php echo base_url('facebook_app/facebooklogin/index/1') ?>"><i class="ti-facebook pr-1"></i><?php echo display('facebook_login') ?></span></a>
                    <?php } ?></span>
                    <div>
                        <p class="fs-20 text-center"><?php echo display("do_not_have_an_account") ?> <a class="text-red" href="<?php echo base_url();?>register"><?php echo display("join_us") ?></a></p><a>
                        </a>
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