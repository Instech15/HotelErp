<div class="card">
    <div class="card-header">
        <h4><?php echo display('common_setting') ?></h4>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <div class="card-body">

                <?php				
				echo form_open_multipart('dashboard/web_setting/common_create','class="form-vertical"') ?>
                <?php echo form_hidden('id',$websetting->id) ?>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label"><?php echo display('email')?></label>
                    <div class="col-sm-6">
                        <input name="email" type="email" class="form-control" id="email"
                            placeholder="<?php echo display('email')?>"
                            value="<?php echo html_escape($websetting->email) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label"><?php echo display('phone') ?></label>
                    <div class="col-sm-6">
                        <input name="phone" type="number" class="form-control" id="phone"
                            placeholder="<?php echo display('phone') ?>"
                            value="<?php echo html_escape($websetting->phone) ?>">
                    </div>
                </div>

                <!-- if setting logo is already uploaded -->
                <?php if(!empty($websetting->logo)) {  ?>
                <div class="form-group row">
                    <label for="logoPreview" class="col-sm col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo base_url(html_escape($websetting->logo)) ?>" alt="Picture"
                            class="img-thumbnail" />
                    </div>
                </div>
                <?php } ?>

                <div class="form-group row">
                    <label for="logo" class="col-sm-3 col-form-label"><?php echo display('header_logo') ?></label>
                    <div class="col-sm-6">
                        <input type="file" name="logo" id="logo">
                        <input type="hidden" name="old_logo" value="<?php echo html_escape($websetting->logo) ?>">
                    </div>
                </div>
                <?php if(!empty($websetting->login_logo)) {  ?>
                <div class="form-group row">
                    <label for="logoPreview" class="col-sm col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo base_url(html_escape($websetting->login_logo)) ?>" alt="Picture"
                            class="img-thumbnail" />
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="login_logo" class="col-sm-3 col-form-label"><?php echo display('login_logo') ?></label>
                    <div class="col-sm-6">
                        <input type="file" name="login_logo" id="login_logo">
                        <input type="hidden" name="old_login_logo"
                            value="<?php echo html_escape($websetting->login_logo) ?>">
                    </div>
                </div>
                <?php if(!empty($websetting->footer_logo)) {  ?>
                <div class="form-group row">
                    <label for="logoPreview" class="col-sm col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo base_url(html_escape($websetting->footer_logo)) ?>" alt="Picture"
                            class="img-thumbnail" />
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="login_logo" class="col-sm-3 col-form-label"><?php echo display('footer_logo') ?></label>
                    <div class="col-sm-6">
                        <input type="file" name="footer_logo" id="footer_logo">
                        <input type="hidden" name="old_footer_logo"
                            value="<?php echo html_escape($websetting->footer_logo) ?>">
                    </div>
                </div>
                <?php if(!empty($websetting->invoice_logo)) {  ?>
                <div class="form-group row">
                    <label for="logoPreview" class="col-sm col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo base_url(html_escape($websetting->invoice_logo)) ?>" alt="Picture"
                            class="img-thumbnail" />
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="login_logo"
                        class="col-sm-3 col-form-label"><?php echo display('invoice_logo') ?></label>
                    <div class="col-sm-6">
                        <input type="file" name="invoice_logo" id="invoice_logo">
                        <input type="hidden" name="old_invoice_logo"
                            value="<?php echo html_escape($websetting->invoice_logo) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="power_text"
                        class="col-sm-3 col-form-label"><?php echo display("powered_by_text");?></label>
                    <div class="col-sm-6">
                        <textarea name="power_text" class="form-control" placeholder="Powered By Text" maxlength="140"
                            rows="7"><?php echo html_escape($websetting->powerbytxt) ?></textarea>
                    </div>
                </div>

                <div class="form-group row  text-right">
                    <label for="power_text" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="submit"
                            class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>