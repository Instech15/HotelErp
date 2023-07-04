<div class="map-content">
    <div id="map"></div>
</div>
<section class="section border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center border-right">
                <h6 class="text-uppercase mb-2 font-weight-bold fs-13"><?php echo display('message_us') ?></h6>
                <!-- /.End of heading -->
                <div class="mb-5 mb-md-0">
                    <a href="#!" class="h4"><?php echo display('start_chat') ?></a>
                </div>
                <!-- /.End of link -->
            </div>
            <?php $hotline=$this->db->select('*')->from('tbl_slider')->where('slid',75)->get()->row();?>
            <div class="col-12 col-md-4 text-center border-right">
                <h6 class="text-uppercase mb-2 font-weight-bold fs-13"><?php echo html_escape($hotline->title);?></h6>
                <!-- /.End of heading -->
                <div class="mb-5 mb-md-0">
                    <a href="#!" class="h4">
                        <?php echo html_escape($hotline->subtitle);?>
                    </a>
                </div>
                <!-- /.End of link -->
            </div>
            <?php $contact=$this->db->select('*')->from('tbl_slider')->where('slid',74)->get()->row();?>
            <div class="col-12 col-md-4 text-center">
                <h6 class="text-uppercase mb-2 font-weight-bold fs-13"><?php echo html_escape($contact->title);?></h6>

                <!-- /.End of heading -->
                <a href="#!" class="h4">
                    <?php echo html_escape($contact->subtitle);?>
                </a>
                <!-- /.End of link -->
            </div>
        </div>
    </div>
</section>
<section class="section section-about">
    <div class="container">
        <div class="row">
            <?php $letus=$this->db->select('*')->from('tbl_widget')->where('widgetid',19)->get()->row();?>
            <div class="col-md-10 offset-md-1">
                <div class="section-title text-center mb-5 col-middle">
                    <h2 class="block-title fs-25 mb-2 font-weight-bold"><?php echo html_escape($letus->widget_title);?>
                    </h2>
                    <div class="sub-title fs-18">
                        <?php echo html_escape($letus->widget_desc);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <div class="contact-info">
                            <div class="mb-4">
                                <?php $address=$this->db->select('*')->from('tbl_slider')->where('slid',72)->get()->row();?>
                                <h3 class="info-title link-title fs-18 mb-3 font-weight-600 position-relative">
                                    <?php echo html_escape($address->title);?></h3>
                                <address class="mb-4">
                                    <?php echo html_escape($address->subtitle);?>
                                </address>
                            </div>
                            <!-- /.End of address -->
                            <?php $phoneapp=$this->db->select('*')->from('tbl_slider')->where('slid',73)->get()->row();?>
                            <div class="mb-4">
                                <h3 class="info-title link-title fs-18 mb-3 font-weight-600 position-relative">
                                    <?php echo html_escape($phoneapp->title);?></h3>
                                <?php echo html_escape($phoneapp->subtitle);?>
                            </div>
                            <!-- /.End of phone -->
                            <div class="mb-4">
                                <?php $emails=$this->db->select('*')->from('tbl_slider')->where('slid',74)->get()->row();?>
                                <h3 class="info-title link-title fs-18 mb-3 font-weight-600 position-relative">
                                    <?php echo html_escape($emails->title);?></h3>
                                <?php echo html_escape($emails->subtitle);?>
                            </div>
                            <!-- /.End of email -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php if ($this->session->flashdata('message')) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('message') ?>
                        </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('exception')) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('exception') ?>
                        </div>
                        <?php } ?>
                        <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo validation_errors() ?>
                        </div>
                        <?php } ?>
                        <?php echo form_open('sendemail');?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Full name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="hello@domain.com" required>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Telephone">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="comments" rows="5" name="comments"
                                placeholder="Tell us what we can help you with!"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="captcha"><?php echo $captcha_image ?></label>

                            <input type="captcha" placeholder="<?php echo display('captcha') ?>" name="captcha"
                                id="captcha" class="form-control fs-16px" autocomplete="off">
                        </div>
                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary"><?php echo display('send_message') ?></button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>