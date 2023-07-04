
  <div class="py-5 bg-gray">
                    <div class="container">
                    <?php echo form_open('user/roomlist');?>
                        <div class="search-area m-0">
                                <div class="row no-gutters custom-search-input-2 search-form-content">
                                
                                    
                                <div class="search-option col-12 col-lg-3">
                                    <label><?php echo display('checkin') ?> <i class="ti-calendar"></i></label>
                                    <input id="daterangepicker" class="form-control" type="text" name="checkin" value="<?php echo $this->session->userdata('checkin');?>">
                                </div>
                                <div class="search-option col-12 col-lg-3">
                                    <label><?php echo display('checkout'); ?> <i class="ti-calendar"></i></label>
                                    <input id="daterangepicker2" class="form-control" type="text" name="checkout" value="<?php echo $this->session->userdata('checkout');?>">
                                </div>
                                    <div class="search-option col-12 col-lg-3">
                                        <div class="d-flex align-items-center justify-content-between h-50 border-bottom w-100 px-lg-3 px-xl-4">
                                            <div class="search-title fs-13 text-uppercase"><?php echo display('adults')?></div>
                                            <div class="d-flex justify-content-center align-items-center number-spinner">
                                                <a class=" btn-pm" data-dir="dwn"><span class="ti-minus"></span></a>
                                                <input type="text" class="spinner" name="adults" value="<?php echo $this->session->userdata('adults');?>">
                                                <a class=" btn-pm" data-dir="up"><span class="ti-plus"></span></a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between h-50 w-100 px-lg-3 px-xl-4">
                                            <div class="search-title fs-13 text-uppercase"><?php echo display('children')?></div>
                                            <div class="d-flex justify-content-center align-items-center children">
                                                <a class=" btn-pm" data-dir="dwn"><span class="ti-minus"></span></a>
                                                <input type="text" class="spinner" name="children" value="<?php echo $this->session->userdata('children');?>">
                                                <a class=" btn-pm" data-dir="up"><span class="ti-plus"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $hotline=$this->db->select('*')->from('tbl_slider')->where('slid',75)->get()->row();?>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn">
                                            <span><?php echo display('need_help')?> <p><?php echo html_escape($hotline->subtitle);?></p></span>
                                            <?php echo display('check_availability')?>
                                        </button>
                                    </div>
                                    
                                </div>
                        </div>
                    <?php echo form_close() ?>
                    </div>
                </div>
            <div class="section">
                <div class="container">
                    <?php $x=0;
                    if(!empty($roominfo)){
                        foreach($roominfo as $singleroom){
                        
                        $bedinfo=$this->db->select("*")->from('bedstype')->where('Bedstypeid',$singleroom->bedstype)->get()->row();
                        $facilityinfo=$this->db->select("roomfacilitydetails.*,roomfaility_ref_accomodation.*")->from('roomfaility_ref_accomodation')->join('roomfacilitydetails','roomfacilitydetails.facilityid=roomfaility_ref_accomodation.facilityid','left')->where('roomfaility_ref_accomodation.room_id',$singleroom->roomid)->get()->result();
                        $roommeasure=$this->db->select("roomsizemesurement.roommesurementitle")->from('roomsizemesurement')->where('roomsizemesurement.mesurementid',$singleroom->roomsizemesurement)->get()->row();
                        $facility=  $this->hotel_model->read_all('*', 'tbl_slider','slid','delation_status','Sltypeid','11');

                        ?>
                        
                        <input name="roomid" type="hidden" value="<?php echo html_escape($singleroom->roomid);?>" />
                    <div class="room-list card shadow-xs rounded-0 p-0 mb-4">
                        <div class="card-body">
                            <div class="media d-block d-md-flex">
                                <div class="position-relative mr-md-4 mb-3 mb-md-0">
                                    <a href="<?php echo base_url();?><?php echo html_escape(!empty($singleroom->room_imagename)?$singleroom->room_imagename:'assets/img/room_search.png');?>" class="room-img position-relative d-block" data-fancybox data-caption="<?php echo html_escape($singleroom->roomtype);?>">
                                        <img src="<?php echo base_url();?><?php echo html_escape(!empty($singleroom->room_imagename)?$singleroom->room_imagename:'assets/img/room_search.png');?>" alt="" class="img-fluid img-fluid-custome width_200 w-sm-100" width="320">
                                    </a>
                                    <div class="icon-content position-absolute d-flex">
                                        <a class="zoom-icon mr-2" href="<?php echo base_url();?><?php echo html_escape(!empty($singleroom->room_imagename)?$singleroom->room_imagename:'assets/img/room_search.png');?>" data-fancybox data-caption="<?php echo html_escape($singleroom->roomtype);?>"><i class="fas fa-search-plus"></i></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="item-overview">
                                            <h5 class="item-title font-weight-bold mt-0"><?php echo html_escape($singleroom->roomtype);?></h5>
                                            <!-- /.End of item title -->
                                            <p class="item-description mb-3"><?php echo html_escape($singleroom->roomdescription);?>
                                            </p>
                                            <!-- /.End of item description -->
                                            <div class="star-rating d-flex fs-13 mb-2">
                                                <div class="star-rating_container text-warning">
                                                </div><!--/.star-rating_container-->
                                                <div class="review-numbers ml-2">
                                                    <?php for($i=1;$i <=$singleroom->number_of_star;$i++){
                                                            echo "<span class='fas fa-star star_colour'></span>";
                                                    } ?>
                                                    <span class="reviews-stats">(<?php echo html_escape($singleroom->number_of_star);?>)</span>
                                                </div><!--/.review-numbers-->
                                            </div>
                                            <!-- /.End of ratting -->
                                            <div class="room-size fs-16 font-weight-bold mr-2"><?php echo html_escape($singleroom->capacity);?>&nbsp;<span><?php echo display('adults'); ?></span> <?php echo html_escape($singleroom->child_limit);?>&nbsp;<span><?php echo display('children'); ?></span></div>
                                            <div class="room-content d-flex align-items-center mb-3">
                                                <div class="room-size fs-16 font-weight-bold mr-2"><?php echo html_escape($singleroom->roomsize);?>&nbsp;<span><?php echo html_escape($roommeasure->roommesurementitle); ?></span></div>
                                                <?php foreach($facilityinfo as $list){ ?>
                                                <div class="room-bed-config mr-2" data-toggle="tooltip" data-placement="top" title="<?php echo html_escape($list->facilitytitle);?>">
                                                    <!--bed-->
                                                    <img src="<?php echo base_url().html_escape(!empty($list->image)?$list->image:'assets/img/Home-page/save_line_all.png');?>" alt="" class="img-fluid">
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <a class="btn btn-gray mb-2 mb-lg-0 mr-2" data-toggle="collapse" href="#details<?php echo $x;?>" role="button" aria-controls="details<?php echo $x;?>"><?php echo display('details') ?><i class="ti-angle-down ml-2"></i></a>
                                            <button class="btn btn-gray mb-2 mb-lg-0" type="button" data-toggle="collapse" data-target="#conditions<?php echo $x;?>" aria-controls="conditions<?php echo $x;?>"><?php echo display('reserve_condition') ?><i class="ti-angle-down ml-2"></i> </button>
                                        </div>
                                        <!-- /.End of item overview -->
                                        <div class="item-info position-relative">
                                            <div class="item-price">
                                                <div class="d-flex justify-content-md-end">
                                                    <span class="h4 mb-0"><?php if($this->storecurrency->position==1){echo $this->storecurrency->curr_icon;}?><?php if($this->storecurrency->position==2){echo $this->storecurrency->curr_icon;}?></span>
<span class="price h2 font-weight-600 text-danger mb-0" data-annual="29" data-monthly="49"><?php echo html_escape(number_format($singleroom->rate, 2, '.', ','));?></span>
                                                    <span class="h6 align-self-end mb-1">/<?php echo display('night') ?></span>
                                                </div>
                                                <?php $free_cancel = $this->db->select("*")->from("tbl_widget")->where("widgetid",30)->get()->row(); ?>
                                                <div class="price-refundable">
                                                    <span><?php echo html_escape($free_cancel->widget_title) ?></span>
                                                </div>
                                            </div>
                                            <?php echo form_open('roomdetails');?>
                                            <input name="roomid" type="hidden" value="<?php echo html_escape($singleroom->roomid);?>" />
                                            <div> <input name="send" type="submit" value="Select" class="btn btn-primary" /></div>
                                            <?php echo form_close() ?>
                                        </div>
                                        <!-- /.End of item price info -->
                                    </div>
                                </div>
                            </div>
                            <div class="collapse multi-collapse" id="details<?php echo $x;?>">
                                <div class="card card-body rounded-0 mt-3">
                                    <h3 class="fs-18 font-weight-bold mb-3"><?php echo display('included_services') ?></h3>
                                    <ul class="list-unstyled list-articles mb-3">
                                    
                                        <li><a href="#"><i class="fas fa-gift mr-2"></i> <?php echo html_escape($bedinfo->bedstypetitle);?></a></li>
                                    </ul>
                                    <h3 class="fs-18 font-weight-bold mb-3"><?php echo display('equipment') ?></h3>
                                    <ul class="list-unstyled list-style-2 list-articles mb-0">
                                        <?php foreach($facilityinfo as $facility){?>
                                        <li><?php echo html_escape($facility->facilitytitle);?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.End of room details -->
                            <div class="collapse multi-collapse" id="conditions<?php echo $x;?>">
                                <div class="card card-body rounded-0 mt-3">
                                    <p><?php echo html_escape($singleroom->reservecondition);?></p>
                                </div>
                            </div>
                            <!-- /.End of reservation condition -->
                        </div> 
                        
                                        </div>
                         <?php $x++; } ?>
                         <?php } 
                        if($x==0){ ?>
                        <h2 class="text-center">
                            <?php echo display("room")." ".display('is_not_available_on_this_date') ?></h2>
                        <?php } ?>
                    <!-- /.End of room list -->
                
                </div>
            </div> 
