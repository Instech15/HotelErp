<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('includes/head') ?>
</head>

<body class="fixed sidebar-mini">
    <input type="hidden" id='base_url' value="<?php echo base_url(); ?>" />
    <input type="hidden" id='csrf_token' value="<?php echo $this->security->get_csrf_hash();?>" />
    <input name="csrfhash" id="csrfhashresarvation" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <input type="hidden" id="findate" value="<?php echo maxfindate(); ?>">
    <input type="hidden" id="currency" value="<?php echo getCurrency()->curr_icon; ?>">
    <input type="hidden" id="position" value="<?php echo getCurrency()->position; ?>">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p><?php echo display('please_wait') ?></p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav class="sidebar sidebar-bunker">
            <?php $this->load->view('includes/sidebar') ?>
        </nav>
        <!-- Page Content  -->
        <div class="content-wrapper">
            <div class="main-content">
                <!--Navbar-->
                <?php $this->load->view('includes/header') ?>
                <!--/.navbar-->
        
                <!--/.Content Header (Page header)-->
                <div class="body-content">
                    <!-- <?php if(strtoupper($this->uri->segment(1)) != strtoupper(display('dashboard')) || strtoupper($title) != strtoupper(display('home'))){ ?>
                    <div class="content-header row align-items-center mb-4">
                        <?php } ?>
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-1 mb-sm-0 p-0 ">
                            <?php if(strtoupper($this->uri->segment(1)) != strtoupper(display('dashboard')) || strtoupper($title) != strtoupper(display('home'))){ ?>
                            <ol class="breadcrumb d-inline-flex font-weight-500 fs-13 bg-white mb-0">
                                <li class="breadcrumb-item"><?php $str=display('home');echo strtoupper($str); ?></a>
                                </li>
                                <?php if($this->uri->segment(2) && $this->uri->segment(1)!='edit-phrase' ){ ?>
                                <li class="breadcrumb-item">
                                    <?php $str1=explode('_', $this->uri->segment(1));echo strtoupper($str1[0]) ?></a>
                                </li>
                                <?php } else { ?>
                                <li class="breadcrumb-item">
                                    <?php $str1[0]=display('dashboard'); echo strtoupper($str1[0]) ?></a></li>
                                <?php } ?>
                                <?php $str2=explode('_', $this->uri->segment(2)); if(strtoupper($str) != strtoupper($str1[0]) && strtoupper($str) != strtoupper($str2[0])){ ?>
                                <li class="breadcrumb-item active">
                                    <?php $str2=explode('_', $this->uri->segment(2));echo (!empty($title)?strtoupper($title):(!empty($str2[0])?strtoupper(str_replace("-"," ",$str2[0])):strtoupper(str_replace("-"," ",$this->uri->segment(1))))) ?></a>
                                </li>
                                <?php } ?>
                            </ol>
                            <?php } ?>
                        </nav>
                        <div class="col-sm-8 header-title">
                        </div>
                        <?php if(strtoupper($this->uri->segment(1)) != strtoupper(display('dashboard')) || strtoupper($title) != strtoupper(display('home'))){ ?>
                    </div>
                    <?php } ?> -->
                    <!-- load messages -->
                    <?php $this->load->view('includes/messages') ?>
                    <!-- load custom page -->
                    <?php echo $this->load->view($module.'/'.$page) ?>
                </div>
                <!--/.body content-->
            </div>
            <!--/.main content-->
            <footer class="footer-content">
                <div class="footer-text d-flex align-items-center justify-content-between">
                    <div class="copy">
                        <?php echo html_escape((!empty($setting->footer_text)?$setting->footer_text:null)) ?>: <a
                            href="<?php echo current_url() ?>"><?php echo html_escape((!empty($setting->title)?$setting->title:null)) ?></a>
                    </div>
                    <div class="credit"><?php echo html_escape((!empty($setting->address)?$setting->address:null)) ?>
                    </div>
                </div>
            </footer>
            <!--/.footer content-->
            <div class="overlay"></div>
        </div>
        <!--/.wrapper-->
    </div>
    <?php $this->load->view('includes/footer') ?>

</body>

</html>