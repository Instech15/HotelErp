<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo html_escape($title);?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('website_assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/installer/css/installer.css" rel="stylesheet">
        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="content-wrapper">
                <div class="container"> 
                    <!-- begin of row -->
                    <div class="row"> 
                        <div class="box px-sm-15"> 
                            <div class="page-content">
                                <div class="outer-container">

                                    <?php 
                                    $error_msg = $this->session->userdata('error_msg');
                                    if(isset($error_msg) && !empty($error_msg)){ ?>

                                    <div class="alert alert-dismissable bg-exception btn-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $error_msg; ?>
                                    </div> 

                                    <?php }?>
                                    

                                    <div class="box-inner">
                                        <div class="inner">
                                            <img src="<?php echo base_url()?>assets/installer/img/001-trash-bin.png" alt="">
                                            <h4>Please delete installer to run your application</h4>
                                        </div>
                                        <div class="text-right">
                                            <a href="<?php echo base_url()?>installer/remove_installer" class="btn btn-danger btn-block">Delete Now</a>
                                        </div>
                                        <div class="text-center bordered-area">
                                            <span>or</span>
                                        </div>
                                    </div>                            
                                    <div class="instruction">
                                        <h5 class="no-text">If you Don't have permission to delete the installer !</h5>
                                        <p class="text-success">Please go through the following steps.</p>
                                        <ul class="step-list">
                                            <li><span>1.</span> Go to the root folder of your server where placed all the files. ex: public_html/</li>
                                            <li><span>2.</span> Delete the install folder.</li>
                                            <li><span>3.</span> Then refresh this page or click the button below.</li>
                                        </ul>
                                        <div class="text-right">
                                            <a href="<?php echo base_url()?>installer" class="btn btn-refresh">Refresh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.End of page wrapper -->
                    <footer class="footer text-center">
                        <div class="container">
                            <div class="fText">Developed by <a target="_blank" href="https://www.bdtask.com/">bdtask</a></div>
                        </div>
                    </footer>
                    <!-- /.End of footer -->
                </div> 
                
            </div>
        </div>
		
        <!-- jQuery -->
        <script src="<?php echo base_url();?>website_assets/plugins/jQuery/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>website_assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url('website_assets/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
		
    </body>
</html>



