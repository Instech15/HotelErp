<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo html_escape((!empty($setting->title) ? $setting->title : null)) ?> ::
        <?php echo html_escape((!empty($title) ? $title : null)) ?></title>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon"
        href="<?php echo base_url((!empty($setting->favicon) ? $setting->favicon : 'assets/img/fav.png')) ?>"
        type="image/x-icon">
    <!-- Start Global Mandatory Style -->
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap rtl -->
    <link href="<?php echo base_url('assets/plugins/fontawesome/css/all.min.css') ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url('assets/plugins/themify-icons/themify-icons.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css?v=4') ?>" rel="stylesheet" type="text/css" />
</head>

<body class="bg-white body-bg">
    <main class="register-content">
        <div class="bg-img-hero position-fixed top-0 right-0 left-0">
            <figure class="position-absolute right-0 bottom-0 left-0 m-0">
                <img src="<?php echo base_url('assets/img/fig.svg') ?>" alt="Image Description">
            </figure>
        </div>
        <div class=" container py-5 py-sm-7">
            <a class="d-flex justify-content-center mb-5 news365-logo" href="">
                <img class="z-index-3"
                    src="<?php echo html_escape(base_url((!empty($web_setting->login_logo) ? $web_setting->login_logo : 'assets/img/login_logo.png'))) ?>"
                    alt="Image Description">
            </a>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="">
                        <!-- alert message -->
                        <?php if ($this->session->flashdata('message') != null) {  ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('exception') != null) {  ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('exception'); ?>
                        </div>
                        <?php } ?>
                        <?php if (validation_errors()) {  ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-card mb-5">
                        <div class="form-card_body">
                            <?php echo form_open('login', 'id="loginForm" novalidate'); ?>
                            <div class="text-center">
                                <div class="mb-5">
                                    <h1 class="display-4 mt-0 font-weight-semi-bold">
                                        <?php echo display('sign_in') ?></h1>
                                    <p><?php echo display('sign_in_using_your_email_address') ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="input-label font-weight-bold" for="inputEmail"><?php echo display("your_email") ?></label>
                                <input type="email" name="email" autocomplete="off" id="inputEmail"
                                    placeholder="<?php echo display('email') ?>" required autofocus
                                    class="form-control im">
                            </div>
                            <div class="form-group">
                                <label class="input-label font-weight-bold"
                                    for="inputPassword"><?php echo display('password') ?></label>
                                <div class="position-relative">
                                    <input type="password" class="form-control password"
                                        placeholder="<?php echo display('password') ?>" name="password"
                                        id="inputPassword" required>
                                    <i onclick="passShow()" class="fa fa-eye-slash"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- capta part -->
                            </div>
                            <div class="form-group">
                                <label class="input-label font-weight-bold" for="captcha"><?php echo $captcha_image ?></label>

                                <input type="captcha" placeholder="<?php echo display('captcha') ?>" name="captcha"
                                    id="captcha" class="form-control fs-16px" autocomplete="off">
                            </div>
                            <a href="forgot-password"><p class="text-right"><?php echo display('forgot_password') ?></p></a>
                            <button type="submit"
                                class="btn btn-lg btn-block btn-success"><?php echo display('login') ?></button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript">
    </script>
    <script src="<?php echo base_url('assets/js/login.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/password.js') ?>" type="text/javascript"></script>

</body>

</html>