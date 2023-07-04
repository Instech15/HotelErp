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
<div class="hero-header">
    <div class="header-slider header-slider-preloader slider-two" id="home">
        <div class="animation-slide owl-carousel owl-theme" id="animation-slide">
            <?php foreach($slider_info as $slider){?>
            <div class="item bg-img-hero"
                data-image-src="<?php echo base_url().html_escape(!empty($slider->image)?$slider->image:'assets/img/Home-page/slider.png');?>">
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- /.End of header slider -->
    <div class="container">
        <div class="hero-header_wrap">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <div class="header-text my-5">
                        <?php $slidertext=$this->db->select('*')->from('tbl_widget')->where('widgetid',1)->get()->row();?>
                        <h6 class="header-subtitle"><?php echo html_escape($slidertext->widget_name);?></h6>
                        <h1 class="header-title"><?php echo html_escape($slidertext->widget_title);?></h1>
                        <p class="header-des mb-0"><?php echo html_escape($slidertext->widget_desc);?></p>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <div class="offer-carousel owl-carousel owl-theme">
                        <?php foreach($randoffer as $myoffer){
								$offerDate = date("F d", strtotime($myoffer->offer_date));
								$offertotal=$myoffer->offer;
								$tax=$this->settinginfo->vat;
								$taxamount=$offertotal*$tax/100;
					 			$servicecharge=$this->settinginfo->servicecharge;
								$serviceamnt=$offertotal*$servicecharge/100;
								$nextdate=date('Y-m-d',strtotime($myoffer->offer_date. "+1 days"));
								$roominfo= $this->db->select('*')->from('roomdetails')->where('roomid',$myoffer->roomid)->get()->row();  
								?>
                        <div class="offer d-flex align-items-center text-center">
                            <div class="w_100">
                                <div class="ribbon">
                                    <span><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php echo html_escape($offertotal);?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span>
                                </div>
                                <h2 class="text-white mb-4 font-weight-bold">
                                    <?php echo html_escape($myoffer->offertitle);?></h2>
                                <h3 class="text-white fs-21"><?php echo html_escape($myoffer->offertext);?></h3>
                                <a href="<?php echo base_url();?>roomdetails?checkin=<?php echo $myoffer->offer_date;?>&checkout=<?php echo $nextdate;?>&adults=<?php echo $roominfo->capacity;?>&children=1&roomid=<?php echo $myoffer->roomid;?>"
                                    class="btn btn-primary mt-5"><?php echo display('book_by') ?>
                                    <?php echo html_escape($offerDate);?></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End of hero header -->
    <div class="slider_preloader">
        <div class="slider_preloader_status">&nbsp;</div>
    </div>
    <!-- /.End of slider preloader -->
</div>
<!-- /.End of hero header -->
<div class="container">
    <div class="search-area">
        <?php echo form_open('user/roomlist');?>
        <div class="row no-gutters custom-search-input-2 search-form-content">
            <div class="search-option col-12 col-sm-6 col-lg-3">
                <label><?php echo display('check_in')?> <i class="ti-calendar"></i></label>
                <input id="daterangepicker" class="form-control" type="text" name="checkin"
                    value="<?php date('Y-m-d');?>">
            </div>
            <div class="search-option col-12 col-sm-6 col-lg-3">
                <label><?php echo display('check_out')?> <i class="ti-calendar"></i></label>
                <input id="daterangepicker2" class="form-control" type="text" name="checkout"
                    value="<?php date('Y-m-d');?>">
            </div>
            <div class="search-option col-12 col-sm-6 col-lg-3">
                <div class="d-flex align-items-center justify-content-between h-50 border-bottom w-100 px-lg-3 px-xl-4">
                    <div class="search-title fs-13 text-uppercase"><?php echo display('adults')?></div>
                    <div class="d-flex justify-content-center align-items-center number-spinner">
                        <a class=" btn-pm" data-dir="dwn"><span class="ti-minus"></span></a>
                        <input type="text" class="spinner" name="adults" value="2">
                        <a class=" btn-pm" data-dir="up"><span class="ti-plus"></span></a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between h-50 w-100 px-lg-3 px-xl-4">
                    <div class="search-title fs-13 text-uppercase"><?php echo display('children')?></div>
                    <div class="d-flex justify-content-center align-items-center children">
                        <a class=" btn-pm" data-dir="dwn"><span class="ti-minus"></span></a>
                        <input type="text" class="spinner" name="children" value="0">
                        <a class=" btn-pm" data-dir="up"><span class="ti-plus"></span></a>
                    </div>
                </div>
            </div>
            <?php $hotline=$this->db->select('*')->from('tbl_slider')->where('slid',75)->get()->row();?>
            <div class="col-lg-3">
                <button type="submit" class="btn black">
                    <span><?php echo display('need_help')?>
                        <p><?php echo html_escape($hotline->subtitle);?></p></span>
                    <?php echo display('check_availability')?>
                </button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
<!-- /.End of search area -->
<div class="section section-feature bg-gray position-relative">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 mb-4 mb-md-0">
                <div class="feature-box text-center">
                    <?php $pig_mpney=$this->db->select('*')->from('tbl_slider')->where('slid',58)->get()->row();?>
                    <div class="feature-box-icon mb-3">
                    <img src="<?php echo html_escape(base_url().(!empty($pig_mpney->image)?$pig_mpney->image:'assets/img/Home-page/save_line_all.png'));?>"
                            alt="Card image" class="img-fluid">
                    </div>
                    <?php $saveupto=$this->db->select('*')->from('tbl_widget')->where('widgetid',7)->get()->row();?>
                    <h4 class="feature-box-title fs-21 font-weight-600">
                        <?php echo html_escape($saveupto->widget_title);?></h4>
                    <p class="mb-0"><?php echo html_escape($saveupto->widget_desc);?></p>
                </div>
            </div>
            <!-- /.End of feature -->
            <div class="col-sm-6 col-md-3 mb-4 mb-md-0">
                <div class="feature-box text-center">
                    <div class="feature-box-icon mb-3">
                        <?php $tik_mark=$this->db->select('*')->from('tbl_slider')->where('slid',59)->get()->row();?>
                        <img src="<?php echo html_escape(base_url().(!empty($tik_mark->image)?$tik_mark->image:'assets/img/Home-page/save_line_all.png'));?>"
                            alt="Card image" class="img-fluid">
                    </div>
                    <?php $best=$this->db->select('*')->from('tbl_widget')->where('widgetid',8)->get()->row();?>
                    <h4 class="feature-box-title fs-21 font-weight-600"><?php echo html_escape($best->widget_title);?>
                    </h4>
                    <p class="mb-0"><?php echo html_escape($best->widget_desc);?></p>
                </div>
            </div>
            <!-- /.End of feature -->
            <div class="col-sm-6 col-md-3 mb-4 mb-sm-0">
                <div class="feature-box text-center">
                    <?php $wifi=$this->db->select('*')->from('tbl_slider')->where('slid',60)->get()->row();?>
                    <div class="feature-box-icon mb-3">
                    <img src="<?php echo html_escape(base_url().(!empty($wifi->image)?$wifi->image:'assets/img/Home-page/save_line_all.png'));?>"
                            alt="Card image" class="img-fluid">
                    </div>
                    <?php $wifi=$this->db->select('*')->from('tbl_widget')->where('widgetid',9)->get()->row();?>
                    <h4 class="feature-box-title fs-21 font-weight-600"><?php echo html_escape($wifi->widget_title);?>
                    </h4>
                    <p class="mb-0"><?php echo html_escape($wifi->widget_desc);?></p>
                </div>
            </div>
            <!-- /.End of feature -->
            <div class="col-sm-6 col-md-3">
                <div class="feature-box text-center">
                    <?php $nights=$this->db->select('*')->from('tbl_slider')->where('slid',61)->get()->row();?>
                    <div class="feature-box-icon mb-3">
                    <img src="<?php echo html_escape(base_url().(!empty($nights->image)?$nights->image:'assets/img/Home-page/save_line_all.png'));?>"
                            alt="Card image" class="img-fluid">
                    </div>
                    <?php $enjoy=$this->db->select('*')->from('tbl_widget')->where('widgetid',10)->get()->row();?>
                    <h4 class="feature-box-title fs-21 font-weight-600"><?php echo html_escape($enjoy->widget_title);?>
                    </h4>
                    <p class="mb-0"><?php echo html_escape($enjoy->widget_desc);?></p>
                </div>
            </div>
            <!-- /.End of feature -->
        </div>
    </div>
</div>
<!-- /.End of feature -->
<!--<div class="section section-about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 col-12">
                <?php foreach($banner_homemiddle as $homemiddle){ ?>
                <div class="position-relative">
                <img src="<?php echo base_url().html_escape(!empty($homemiddle->image)?$homemiddle->image:'assets/img/Home-page/below_slider.png');?>"
                        class="rounded img-fluid mx-auto d-block" alt="">
                    <div class="play-icon">
                        <a href="<?php echo html_escape($homemiddle->slink);?>" class="play-btn video-play-icon">
                            <i class="mdi mdi-play text-primary rounded-circle bg-white shadow"></i>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!--end col-->

     <!--       <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="ml-lg-5 ml-md-4">
                    <div class="section-title">
                        <?php $hmd=$this->db->select('*')->from('tbl_widget')->where('widgetid',3)->get()->row();?>
                        <span class="badge badge-pill badge-soft-primary"><?php echo display('about') ?></span>
                        <h4 class="title mt-3 mb-4"><span
                                class="text-primary"><?php echo html_escape($hmd->widget_title);?></span></h4>
                        <p class="text-muted para-desc mx-auto mb-0">
                            <?php echo html_escape($hmd->widget_desc);?></p>
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary"><?php echo display('learn_more') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

    <!--    </div>
    </div>
</div>-->



<div class="section container rounded join-content box-shadow mb-5 shadow">
    <div class="text-center col-middle">
        <?php $joinus=$this->db->select('*')->from('tbl_widget')->where('widgetid',6)->get()->row();?>
        <h2 class="fs-32 text-white mb-4 "><?php echo html_escape($joinus->widget_desc);?></h2>
        <a href="<?php echo base_url();?>user/login"
            class="btn btn-outline-white mr-3"><?php echo display('sign_in')?></a>
        <a href="<?php echo base_url();?>register" class="btn btn-white"><?php echo display('join_us')?></a>
    </div>
</div>
<!-- /.End of join box -->
<!--<div class="section bg-gray">
    <div class="container">
        <div class="row">
            <?php $topoffers=$this->db->select('*')->from('tbl_widget')->where('widgetid',4)->get()->row();?>
            <div class="col-md-10 offset-md-1">
                <div class="section-title text-center mb-5 col-middle">
                    <h2 class="block-title fs-25 mb-2 font-weight-bold">
                        <?php echo html_escape($topoffers->widget_title);?></h2>
                    <div class="sub-title fs-18">
                        <?php echo html_escape($topoffers->widget_desc);?>
                    </div>
                </div>
                <!-- /.End of section title -->
<!--            </div>
        </div>
        <div class="row">
            <?php foreach($banner_topweek as $topweek){ ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card border-0 box-shadow rounded-0 mb-4">
                <a href="<?php echo html_escape($topweek->slink);?>" class="card-img position-relative">
                        <img src="<?php echo html_escape(base_url().(!empty($topweek->image)?$topweek->image:'assets/img/Home-page/below_slider_second.png'));?>" class="img-fluid wd_xs_100" alt="...">
                        <button type="button"
                            class="position-absolute btn btn-primary btn-sm"><?php echo display('book_now') ?></button>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title mb-0 weeklyoffer-title"><a href="<?php echo html_escape($topweek->slink);?>"
                                class="text-dark"><?php echo html_escape($topweek->title);?></a></h5>
                    </div>
                </div>
                <!-- /.End of card -->
<!--            </div>
            <?php } ?>
        </div>
    </div>
</div>-->
<?php $destination=$this->db->select('*')->from('tbl_widget')->where('widgetid',5)->get()->row();?>
<!-- <div class="section section-destination">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section-title text-center mb-5 col-middle">
                    <h2 class="block-title fs-25 mb-2 font-weight-bold">
                        <?php echo html_escape($destination->widget_title);?></h2>
                    <div class="sub-title fs-18">
                        <?php echo html_escape($destination->widget_desc);?>
                    </div>
                </div>
                <!-- /.End of section title -->
<!--            </div>
        </div>
        <div class="destinations-carousel owl-carousel owl-theme">
            <?php foreach($banner_destination as $destination){ ?>
            <div class="card card-poster text-white flex-row align-items-end border-0">
                <a href="<?php echo html_escape($destination->slink);?>"
                    class="tile-link position-absolute w-100 h-100 top-0 left-0"></a>
                    <img src="<?php echo html_escape(base_url().(!empty($destination->image)?$destination->image:'assets/img/Home-page/explore_destinations.png'));?>"
                    alt="Card image" class="bg-image">
                <div class="card-body overlay-content position-relative">
                    <div class="mb-3">
                        <button type="button"
                            class="btn btn-primary btn-sm book-btn"><?php echo display('book_now') ?></button>
                    </div>
                    <span
                        class="item-tag text-uppercase bg-white font-weight-500 mb-2 d-inline-block"><?php echo html_escape($destination->subtitle);?></span>
                    <h5 class="card-title font-weight-bold text-white"><?php echo html_escape($destination->title);?>
                    </h5>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</div>
<!-- /.End of destination -->