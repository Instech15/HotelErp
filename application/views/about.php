    <div class="section">
        <div class="container">
            <?php $smallteam=$this->db->select('*')->from('tbl_widget')->where('widgetid',12)->get()->row();?>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                    <h1 class="display-4 font-weight-bold"><?php echo html_escape($smallteam->widget_title);?></h1>
                    <p class="lead text-muted mb-5">
                        <?php echo html_escape($smallteam->widget_desc);?>
                    </p>
                </div>
            </div>

            <div class="form-row mb-5">
                <?php 
				$cols4='';
				$cols3='';
				$cols5='';
				$cols55='';
				$cols57='';
				$i=0;
				foreach($about_smallbig as $smallbig){
					$i++;
					if($i==1){
						$cols4=base_url().(!empty($smallbig->image)?$smallbig->image:'assets/img/About-us/left_1st.png');
						}
					if($i>1 && $i<4){
						$cols3.='<img src="'.base_url().(!empty($smallbig->image)?$smallbig->image:'assets/img/About-us/small_team_2.png').'" class="img-fluid rounded shadow-lg mb-4" alt="...">';
						}
					if($i==4){
						$cols55=base_url().(!empty($smallbig->image)?$smallbig->image:'assets/img/About-us/small_team_3.png');
						}
					if($i==5){
						$cols57=base_url().(!empty($smallbig->image)?$smallbig->image:'assets/img/About-us/small_team_4.png');
						}
					if($i==6){
						$cols5=base_url().(!empty($smallbig->image)?$smallbig->image:'assets/img/About-us/small_team_6.png');
						}
				  }
					 ?>
                <div class="col-4">
                    <img src="<?php echo $cols4;?>" class="img-fluid rounded shadow-lg" alt="...">
                </div>
                <div class="col-3">
                    <?php echo $cols3;?>
                </div>
                <div class="col-5">
                    <div class="form-row mb-4">
                        <div class="col-5">
                            <img src="<?php echo $cols55;?>" class="img-fluid rounded shadow-lg" alt="...">
                        </div>
                        <div class="col-7">
                            <img src="<?php echo $cols57;?>" class="img-fluid rounded shadow-lg" alt="...">
                        </div>
                    </div>
                    <img src="<?php echo $cols5;?>" class="img-fluid rounded shadow-lg mt-1" alt="...">
                </div>
            </div>
            <?php $overview=$this->db->select('*')->from('tbl_slider')->where('sltypeid',13)->get()->result();?>
            <div class="row justify-content-center">
            <?php foreach($overview as $ov){ ?>
                <div class="col-6 mb-3 col-lg-3 mb-lg-0"><span class="numscroller display-4 text-primary d-block"
                        data-min="1" data-max="<?php echo html_escape($ov->title);?>" data-delay="5" data-increment="<?php echo html_escape($ov->link1);?>"><?php echo html_escape($ov->title);?></span> <span
                        class="h6"><?php echo html_escape($ov->subtitle);?></span></div>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="section section-about">
        <div class="container">
            <div class="row">
                <?php $thausand=$this->db->select('*')->from('tbl_widget')->where('widgetid',13)->get()->row();?>
                <div class="col-md-10 offset-md-1">
                    <div class="section-title text-center mb-5 col-middle">
                        <h2 class="block-title fs-25 mb-2 font-weight-bold">
                            <?php echo html_escape($thausand->widget_title);?></h2>
                        <div class="sub-title fs-18">
                            <?php echo html_escape($thausand->widget_desc);?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach($company as $company_logo){ ?>
                <div class="col-4 col-md-2 mb-5">
                    <img class="clients"
                        src="<?php echo base_url().html_escape(!empty($company_logo->image)?$company_logo->image:'assets/img/About-us/trusted_by_companies.png');?>"
                        alt="Image Description">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Our team Section 
    <div class="section team">
        <div class="container">
            <div class="row">
                <?php $oteam=$this->db->select('*')->from('tbl_widget')->where('widgetid',11)->get()->row();?>
                <div class="col-md-10 offset-md-1">
                    <div class="section-title text-center mb-5">
                        <h2 class="block-title fs-25 mb-2 font-weight-bold">
                            <?php echo html_escape($oteam->widget_title);?></h2>
                        <div class="sub-title fs-18">
                            <?php echo html_escape($oteam->widget_desc);?>
                        </div>
                    </div>
                    <!-- /.End of section title -->
         <!--       </div>
            </div>
            <div class="row text-center">
                <?php $social=$this->db->select('*')->from('tbl_widget')->where('widgetid',28)->get()->row();?>
                <?php foreach($team_info as $teaminfo){ ?>
                <div class="col-md-3">
                    <div class="team-member">
                        <figure>
                            <img src="<?php echo base_url().html_escape(!empty($teaminfo->image)?$teaminfo->image:'assets/img/About-us/our_team.png');?>"
                                alt="" class="img-fluid">
                            <figcaption
                                class="d-flex flex-column justify-content-center align-content-center position-absolute bottom-0 left-0 w-100 p-3">
                                <p><?php echo html_escape($teaminfo->slink);?></p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><a href="<?php echo html_escape($teaminfo->link1);?>"
                                            class="text-white fs-24"><i class="fab fa-facebook-square"></i></a></li>
                                    <li class="list-inline-item"><a href="<?php echo html_escape($teaminfo->link2);?>"
                                            class="text-white fs-24"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="<?php echo html_escape($teaminfo->link3);?>"
                                            class="text-white fs-24"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </figcaption>
                        </figure>
                        <h4 class="fs-21 font-weight-600 mt-2 mb-0"><?php echo html_escape($teaminfo->title);?></h4>
                        <p class="mb-0"><?php echo html_escape($teaminfo->subtitle);?></p>
                    </div>
                    <!-- /.End of team member -->
              <!--  </div>
                <?php } ?>
            </div>
        </div>
    </div>-->