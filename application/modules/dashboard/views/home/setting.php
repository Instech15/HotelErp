<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            <div class="card-body">
                <?php echo form_open_multipart('dashboard/setting/create','class="form-inner"') ?>
                <?php echo form_hidden('id',$setting->id) ?>

                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label"><?php echo display('application_title') ?> <i
                            class="text-danger">*</i></label>
                    <div class="col-sm-6">
                        <input name="title" type="text" class="form-control" id="title"
                            placeholder="<?php echo display('application_title') ?>"
                            value="<?php echo html_escape($setting->title) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stname" class="col-sm-3 col-form-label"><?php echo display("store_name"); ?></label>
                    <div class="col-sm-6">
                        <input name="stname" type="text" class="form-control" id="stname"
                            placeholder="<?php echo display("store_name"); ?>"
                            value="<?php echo html_escape($setting->storename) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label"><?php echo display('address') ?></label>
                    <div class="col-sm-6">
                        <input name="address" type="text" class="form-control" id="address"
                            placeholder="<?php echo display('address') ?>"
                            value="<?php echo html_escape($setting->address) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label"><?php echo display('email')?></label>
                    <div class="col-sm-6">
                        <input name="email" type="text" class="form-control" id="email"
                            placeholder="<?php echo display('email')?>"
                            value="<?php echo html_escape($setting->email) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label"><?php echo display('phone') ?></label>
                    <div class="col-sm-6">
                        <input name="phone" type="number" class="form-control" id="phone"
                            placeholder="<?php echo display('phone') ?>"
                            value="<?php echo html_escape($setting->phone) ?>">
                    </div>
                </div>
                <!-- if setting favicon is already uploaded -->
                <?php if(!empty($setting->favicon)) {  ?>
                <div class="form-group row">
                    <label for="faviconPreview" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo html_escape(base_url($setting->favicon)) ?>" alt="Favicon"
                            class="img-thumbnail" />
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="favicon" class="col-sm-3 col-form-label"><?php echo display('favicon') ?> </label>
                    <div class="col-sm-6">
                        <input type="file" name="favicon" id="favicon">
                        <input type="hidden" name="old_favicon" value="<?php echo html_escape($setting->favicon) ?>">
                    </div>
                </div>
                <!-- if setting logo is already uploaded -->
                <?php if(!empty($setting->logo)) {  ?>
                <div class="form-group row">
                    <label for="logoPreview" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo html_escape(base_url($setting->logo)) ?>" alt="Picture"
                            class="img-thumbnail" />
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3 col-form-label"><?php echo display('logo') ?></label>
                    <div class="col-sm-6">
                        <input type="file" name="logo" id="logo">
                        <input type="hidden" name="old_logo" value="<?php echo html_escape($setting->logo) ?>">
                    </div>
                </div>
                <!-- if setting Splash Image is already uploaded -->
                <?php if(!empty($setting->splash_logo)) {  ?>
                <div class="form-group row">
                    <label for="logoPreview" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                        <img src="<?php echo html_escape(base_url($setting->splash_logo)) ?>" alt="Picture"
                            class="img-thumbnail width_80px" />
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3 col-form-label"><?php echo display('splash') ?></label>
                    <div class="col-sm-6">
                        <input type="file" name="splash_logo" id="splash_logo">
                        <input type="hidden" name="splash_logo"
                            value="<?php echo html_escape($setting->splash_logo) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storevat" class="col-sm-3 col-form-label"><?php echo display("vat_tax")." ".display("setting")."(%)"; ?></label>
                    <div class="col-sm-6">
                        <input name="storevat" type="text" class="form-control" id="storevat"
                            placeholder="<?php echo display("vat_tax"); ?>" value="<?php echo html_escape($setting->vat) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storevat" class="col-sm-3 col-form-label"><?php echo display("service_charge")."(%)"; ?></label>
                    <div class="col-sm-6">
                        <input name="scharge" type="text" class="form-control" id="scharge"
                            placeholder="<?php echo display("service_charge"); ?>"
                            value="<?php echo html_escape($setting->servicecharge) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storevat" class="col-sm-3 col-form-label"><?php echo display("country"); ?></label>
                    <div class="col-sm-6">
                        <input name="country" type="text" class="form-control" id="country"
                            placeholder="<?php echo display("country"); ?>" value="<?php echo html_escape($setting->country) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storekey" class="col-sm-3 col-form-label"><?php echo display("map_key"); ?></label>
                    <div class="col-sm-6">
                        <input name="map_key" type="text" class="form-control" id="map_key"
                            placeholder="<?php echo display("map_key"); ?>" value="<?php echo html_escape($setting->map_key) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storelatitude" class="col-sm-3 col-form-label"><?php echo display("latitude"); ?></label>
                    <div class="col-sm-6">
                        <input name="latitude" type="text" class="form-control" id="latitude"
                            placeholder="<?php echo display("latitude"); ?>"
                            value="<?php echo html_escape($setting->latitude) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storelongitude" class="col-sm-3 col-form-label"><?php echo display("longitude"); ?></label>
                    <div class="col-sm-6">
                        <input name="longitude" type="text" class="form-control" id="longitude"
                            placeholder="<?php echo display("longitude"); ?>"
                            value="<?php echo html_escape($setting->longitude) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="footer_text" class="col-sm-3 col-form-label"><?php echo display('currency') ?></label>
                    <div class="col-sm-6">
                        <?php echo form_dropdown('currency',$currencyList,$setting->currency, 'class="form-control"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="footer_text" class="col-sm-3 col-form-label"><?php echo display('language') ?></label>
                    <div class="col-sm-6">
                        <?php echo form_dropdown('language',$languageList,$setting->language, 'class="form-control"') ?>
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label for="footer_text"
                        class="col-sm-3 col-form-label"><?php echo display('date_format'); ?></label>
                    <div class="col-sm-6">
                        <select class="form-control basic-single" name="timeformat">
                            <option value=""><?php echo display('select_date_format') ?></option>
                            <option value="d/m/Y" <?php if($setting->dateformat=="d/m/Y"){ echo display('selected');}?>>
                                <?php echo display('ddmmyyyy'); ?></option>
                            <option value="Y/m/d" <?php if($setting->dateformat=="Y/m/d"){ echo display('selected');}?>>
                                <?php echo display('yyyymmdd'); ?></option>
                            <option value="d-m-Y" <?php if($setting->dateformat=="d-m-Y"){ echo display('selected');}?>>
                                <?php echo display('dmy'); ?></option>
                            <option value="Y-m-d" <?php if($setting->dateformat=="Y-m-d"){ echo display('selected');}?>>
                                <?php echo display('ymd'); ?></option>
                            <option value="m/d/Y" <?php if($setting->dateformat=="m/d/Y"){ echo display('selected');}?>>
                                <?php echo display('mdy'); ?></option>
                            <option value="d M,Y" <?php if($setting->dateformat=="d M,Y"){ echo display('selected');}?>>
                                <?php echo display('ddmyyyy'); ?></option>
                            <option value="d F,Y" <?php if($setting->dateformat=="d F,Y"){ echo display('selected');}?>>
                                <?php echo display('mmddyyyy'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="footer_text"
                        class="col-sm-3 col-form-label"><?php echo display('timezone'); ?></label>
                    <div class="col-sm-6">
                        <select class="form-control basic-single" name="timezone">
                            <option value=""><?php echo display('select')." ".display("timezone") ?></option>
                            <?php foreach($timezone as $tzone){ ?>
                                <option value="<?php echo html_escape($tzone->zone) ?>" <?php if(strtolower($setting->timezone)==strtolower($tzone->zone)){ echo display('selected');}?>>
                                    <?php echo html_escape($tzone->zone) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="checkin" class="col-sm-3 col-form-label"><?php echo display('checkin_time'); ?></label>
                    <div class="col-sm-6">
                        <input name="checkintime" type="text" class="form-control" id="checkintime"
                            placeholder="<?php echo display('checkin_time'); ?>"
                            value="<?php echo html_escape($setting->checkintime) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="storevat"
                        class="col-sm-3 col-form-label"><?php echo display('checkout_time'); ?></label>
                    <div class="col-sm-6">
                        <input name="checkouttime" type="text" class="form-control" id="checkouttime"
                            placeholder="<?php echo display('checkout_time'); ?>"
                            value="<?php echo html_escape($setting->checkouttime) ?>">
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label for="footer_text" class="col-sm-3 col-form-label"><?php echo display('site_align') ?></label>
                    <div class="col-sm-6">
                        <?php echo form_dropdown('site_align', array('LTR' => display('left_to_right'), 'RTL' => display('right_to_left')) ,$setting->site_align, 'class="basic-single form-control" id="site_align"') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pricetxt" class="col-sm-3 col-form-label"><?php echo display("price_text");?></label>
                    <div class="col-sm-6">
                        <textarea name="pricetxt" class="form-control" placeholder="<?php echo display("price_text");?>" maxlength="140"
                            rows="7"><?php echo html_escape($setting->pricetxt) ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="power_text" class="col-sm-3 col-form-label"><?php echo display("powered_by_text");?></label>
                    <div class="col-sm-6">
                        <textarea name="power_text" class="form-control" placeholder="<?php echo display("powered_by_text");?>" maxlength="140"
                            rows="7"><?php echo html_escape($setting->powerbytxt) ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="footer_text"
                        class="col-sm-3 col-form-label"><?php echo display('footer_text') ?></label>
                    <div class="col-sm-6">
                        <textarea name="footer_text" class="form-control" placeholder="<?php echo display('footer_text') ?>" maxlength="140"
                            rows="7"><?php echo html_escape($setting->footer_text) ?></textarea>
                    </div>
                </div>

                <div class="form-group row text-right">
                    <label for="footer_text" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>