<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/settings.css') ?>">
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?></h4>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-3 ">
                        <div class="nav flex-column nav-pills custom_tablist">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="v-pills-user-tab" data-toggle="pill"
                                        href="#v-pills-user" role="tab" aria-controls="v-pills-user"
                                        aria-selected="true"><?php echo display('add_user'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getuserlist()" id="v-pills-userlist-tab"
                                        data-toggle="pill" href="#v-pills-userlist" role="tab"
                                        aria-controls="v-pills-userlist"
                                        aria-selected="false"><?php echo display('user_list'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rolepermission_cls" onclick="getrolepermission_form()"
                                        id="v-pills-rolepermission-tab" data-toggle="pill"
                                        href="#v-pills-rolepermission" role="tab" aria-controls="v-pills-rolepermission"
                                        aria-selected="false"><?php echo display('role_permission'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getrolepermission_list()" id="v-pills-rolelist-tab"
                                        data-toggle="pill" href="#v-pills-rolelist" role="tab"
                                        aria-controls="v-pills-rolelist"
                                        aria-selected="false"><?php echo display('role_list'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getassignuserrole()" id="v-pills-assignuserrole-tab"
                                        data-toggle="pill" href="#v-pills-assignuserrole" role="tab"
                                        aria-controls="v-pills-assignuserrole"
                                        aria-selected="false"><?php echo display('add_role'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getassignuserrolelist()"
                                        id="v-pills-assignuserrolelist-tab" data-toggle="pill"
                                        href="#v-pills-assignuserrolelist" role="tab"
                                        aria-controls="v-pills-assignuserrolelist"
                                        aria-selected="false"><?php echo display('user_access_role') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getlanguage();" id="v-pills-addlanguage-tab"
                                        data-toggle="pill" href="#v-pills-addlanguage" role="tab"
                                        aria-controls="v-pills-addlanguage"
                                        aria-selected="false"><?php echo display('language'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getphrase()" id="v-pills-addphrase-tab"
                                        data-toggle="pill" href="#v-pills-addphrase" role="tab"
                                        aria-controls="v-pills-addphrase"
                                        aria-selected="false"><?php echo display('add_phrase'); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" onclick="getmailconfig()" id="v-pills-mailconfigs-tab"
                                        data-toggle="pill" href="#v-pills-mailconfigs" role="tab"
                                        aria-controls="v-pills-mailconfigs"
                                        aria-selected="false"><?php echo display('email_setting'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getsmsconfig()" id="v-pills-smsconfigs-tab"
                                        data-toggle="pill" href="#v-pills-smsconfigs" role="tab"
                                        aria-controls="v-pills-smsconfigs"
                                        aria-selected="false"><?php echo display('sms_configuration'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getsmstemplate()" id="v-pills-smstemplate-tab"
                                        data-toggle="pill" href="#v-pills-smstemplates" role="tab"
                                        aria-controls="v-pills-smstemplates"
                                        aria-selected="false"><?php echo display('sms_template'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getsubscriberlist()" id="v-pills-subscriberlist-tab"
                                        data-toggle="pill" href="#v-pills-subscriberlist" role="tab"
                                        aria-controls="v-pills-subscriberlist"
                                        aria-selected="false"><?php echo display('subscribelist'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getmenusetting()" id="v-pills-menusetting-tab"
                                        data-toggle="pill" href="#v-pills-menusetting" role="tab"
                                        aria-controls="v-pills-menusetting"
                                        aria-selected="false"><?php echo display('menu_setting'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getcurrencylist()" id="v-pills-currencylist-tab"
                                        data-toggle="pill" href="#v-pills-currencylist" role="tab"
                                        aria-controls="v-pills-currencylist"
                                        aria-selected="false"><?php echo display('currency'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getapplicationlist()" id="v-pills-applicationlist-tab"
                                        data-toggle="pill" href="#v-pills-applicationlist" role="tab"
                                        aria-controls="v-pills-applicationlist"
                                        aria-selected="false"><?php echo display('application_setting'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getcommonlist()" id="v-pills-commonlist-tab"
                                        data-toggle="pill" href="#v-pills-commonlist" role="tab"
                                        aria-controls="v-pills-commonlist"
                                        aria-selected="false"><?php echo display('common_setting'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getcompanies()" id="v-pills-companies-tab"
                                        data-toggle="pill" href="#v-pills-companies" role="tab"
                                        aria-controls="v-pills-companies"
                                        aria-selected="false"><?php echo display("brand_logo"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getteammembers()" id="v-pills-teammembers-tab"
                                        data-toggle="pill" href="#v-pills-teammembers" role="tab"
                                        aria-controls="v-pills-teammembers"
                                        aria-selected="false"><?php echo display("team_members"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getvisitors()" id="v-pills-visitor-tab"
                                        data-toggle="pill" href="#v-pills-visitor" role="tab"
                                        aria-controls="v-pills-visitor"
                                        aria-selected="false"><?php echo display("counter"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getteamgallery()" id="v-pills-teamgallery-tab"
                                        data-toggle="pill" href="#v-pills-teamgallery" role="tab"
                                        aria-controls="v-pills-teamgallery"
                                        aria-selected="false"><?php echo display("team_gallery"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getcontactinfo()" id="v-pills-contactinfo-tab"
                                        data-toggle="pill" href="#v-pills-contactinfo" role="tab"
                                        aria-controls="v-pills-contactinfo"
                                        aria-selected="false"><?php echo display("contact_information"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getgallery()" id="v-pills-gallery-tab"
                                        data-toggle="pill" href="#v-pills-gallery" role="tab"
                                        aria-controls="v-pills-gallery"
                                        aria-selected="false"><?php echo display("gallery"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getslider()" id="v-pills-slider-tab" data-toggle="pill"
                                        href="#v-pills-slider" role="tab" aria-controls="v-pills-slider"
                                        aria-selected="false"><?php echo display("slider"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getpromise()" id="v-pills-promise-tab"
                                        data-toggle="pill" href="#v-pills-promise" role="tab"
                                        aria-controls="v-pills-promise"
                                        aria-selected="false"><?php echo display("home_section_1"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="gethomeabout()" id="v-pills-homeabout-tab"
                                        data-toggle="pill" href="#v-pills-homeabout" role="tab"
                                        aria-controls="v-pills-homeabout"
                                        aria-selected="false"><?php echo display("home_section_2"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="gettopoffer()" id="v-pills-topoffer-tab"
                                        data-toggle="pill" href="#v-pills-topoffer" role="tab"
                                        aria-controls="v-pills-topoffer"
                                        aria-selected="false"><?php echo display("home_section_3"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getblogoffer()" id="v-pills-blogoffer-tab"
                                        data-toggle="pill" href="#v-pills-blogoffer" role="tab"
                                        aria-controls="v-pills-blogoffer"
                                        aria-selected="false"><?php echo display("home_section_4"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getroomfeature()" id="v-pills-roomfeature-tab"
                                        data-toggle="pill" href="#v-pills-roomfeature" role="tab"
                                        aria-controls="v-pills-roomfeature"
                                        aria-selected="false"><?php echo display("room_feature"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getcheckout()" id="v-pills-checkout-tab"
                                        data-toggle="pill" href="#v-pills-checkout" role="tab"
                                        aria-controls="v-pills-checkout"
                                        aria-selected="false"><?php echo display("checkout"); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="getfooter()" id="v-pills-footer-tab" data-toggle="pill"
                                        href="#v-pills-footer" role="tab" aria-controls="v-pills-footer"
                                        aria-selected="false"><?php echo display("footer"); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9 p-15">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel"
                                aria-labelledby="v-pills-user-tab">
                                <h4><?php echo display('add_user'); ?></h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="firstname" class="col-sm-2 gallery-inp-hi"><?php echo display('firstname') ?> <i
                                            class="text-danger"> * </i></label>
                                    <div class="col-sm-9">
                                        <input name="firstname" class="form-control" type="text"
                                            placeholder="<?php echo display('firstname') ?>" id="firstname" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-sm-2 gallery-inp-hi"><?php echo display('lastname') ?> <i
                                            class="text-danger"> * </i></label>
                                    <div class="col-sm-9">
                                        <input name="lastname" class="form-control" type="text"
                                            placeholder="<?php echo display('lastname') ?>" id="lastname" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 gallery-inp-hi"><?php echo display('email') ?> <i
                                            class="text-danger"> * </i></label>
                                    <div class="col-sm-9">
                                        <input name="email" class="form-control" type="text"
                                            placeholder="<?php echo display('email') ?>" id="email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 gallery-inp-hi"><?php echo display('password') ?> <i
                                            class="text-danger"> * </i></label>
                                    <div class="col-sm-9">
                                        <input name="password" class="form-control" type="password"
                                            placeholder="<?php echo display('password') ?>" id="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="about" class="col-sm-2 gallery-inp-hi"><?php echo display('about') ?></label>
                                    <div class="col-sm-9">
                                        <textarea name="about" placeholder="<?php echo display('about') ?>"
                                            class="form-control" id="about"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 gallery-inp-hi"><?php echo display('image') ?><i
                                            class="text-danger"> * </i></label>
                                    <div class="col-sm-9">
                                        <div>
                                            <input type="file" name="image" id="image" class="custom-input-file" />
                                            <label for="image">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo display('choose_file'); ?>…</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2"><?php echo display('status'); ?><i
                                            class="text-danger"> * </i></label>
                                    <div class="col-sm-9">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="active" class="status" name="status" value="1"
                                                checked>
                                            <label for="active"> <?php echo display('active'); ?> </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="inactive" class="status" name="status" value="0">
                                            <label for="inactive"><?php echo display('inactive'); ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="offset-2 mb-3 group-end">
                                    <button type="button" class="btn btn-info w-md m-b-5"
                                        onclick="user_save()"><?php echo display('save') ?></button>
                                    <a class="btn btn-success btnNext " id="v-pills-userlist-tab" data-toggle="pill"
                                        href="#v-pills-userlist"><?php echo display('next'); ?></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-userlist" role="tabpanel"
                                aria-labelledby="v-pills-userlist-tab">
                                <div class="userlistshow">
                                </div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-user-tab" data-toggle="pill"
                                        href="#v-pills-user"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-rolepermission-tab"
                                        data-toggle="pill"
                                        href="#v-pills-rolepermission"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-rolepermission" role="tabpanel"
                                aria-labelledby="v-pills-rolepermission-tab">
                                <?php echo form_open_multipart('dashboard/role/save_create', 'class="myform" id="myform"'); ?>
                                <div class="rolepermissionfrm_show">

                                </div>
                                <br>
                                <?php echo form_close(); ?>
                                <div class="offset-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-userlist-tab" data-toggle="pill"
                                        href="#v-pills-userlist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-rolelist-tab" data-toggle="pill"
                                        href="#v-pills-rolelist"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-rolelist" role="tabpanel"
                                aria-labelledby="v-pills-rolelist-tab">
                                <div class="rolepermissionlist_show"></div><br>

                                <div class="offset-3 group-end">
                                    <a class="btn btn-danger btnPrevious" onclick="getrolepermission_form()"
                                        id="v-pills-rolepermission-tab" data-toggle="pill"
                                        href="#v-pills-rolepermission"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-assignuserrole-tab"
                                        data-toggle="pill"
                                        href="#v-pills-assignuserrole"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-assignuserrole" role="tabpanel"
                                aria-labelledby="v-pills-assignuserrole-tab">
                                <div class="assignuserrole_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-rolelist-tab" data-toggle="pill"
                                        href="#v-pills-rolelist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-assignuserrolelist-tab"
                                        data-toggle="pill"
                                        href="#v-pills-assignuserrolelist"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-assignuserrolelist" role="tabpanel"
                                aria-labelledby="v-pills-assignuserrolelist-tab">
                                <div class="assignuserrolelist_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-assignuserrole-tab"
                                        data-toggle="pill"
                                        href="#v-pills-assignuserrole"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-addlanguage-tab" data-toggle="pill"
                                        href="#v-pills-addlanguage"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-addlanguage" role="tabpanel"
                                aria-labelledby="v-pills-addlanguage-tab">
                                <div class="addlanguage_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-assignuserrolelist-tab"
                                        data-toggle="pill"
                                        href="#v-pills-assignuserrolelist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-addphrase-tab" data-toggle="pill"
                                        href="#v-pills-addphrase"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-addphrase" role="tabpanel"
                                aria-labelledby="v-pills-addphrase-tab">
                                <div class="addphrase_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-addlanguage-tab"
                                        data-toggle="pill"
                                        href="#v-pills-addlanguage"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-mailconfigs-tab" data-toggle="pill"
                                        href="#v-pills-mailconfigs"><?php echo display('next'); ?></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-mailconfigs" role="tabpanel"
                                aria-labelledby="v-pills-mailconfigs-tab">
                                <div class="mailconfigs_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-addphrase-tab" data-toggle="pill"
                                        href="#v-pills-addphrase"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-smsconfigs-tab" data-toggle="pill"
                                        href="#v-pills-smsconfigs"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-smsconfigs" role="tabpanel"
                                aria-labelledby="v-pills-smsconfigs-tab">
                                <div class="smsconfig_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-mailconfigs-tab"
                                        data-toggle="pill"
                                        href="#v-pills-mailconfigs"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-paypalconfig-tab" data-toggle="pill"
                                        href="#v-pills-smstemplates"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-smstemplates" role="tabpanel"
                                aria-labelledby="v-pills-smsconfigs-tab">
                                <div class="smstemplate_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-smstemplates-tab"
                                        data-toggle="pill"
                                        href="#v-pills-smsconfigs"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-paypalconfig-tab" data-toggle="pill"
                                        href="#v-pills-paypalconfig"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-subscriberlist" role="tabpanel"
                                aria-labelledby="v-pills-subscriberlist-tab">
                                <div class="subscriberlist_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-smstemplates-tab"
                                        data-toggle="pill"
                                        href="#v-pills-smstemplates"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-menusetting-tab" data-toggle="pill"
                                        href="#v-pills-menusetting"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-menusetting" role="tabpanel"
                                aria-labelledby="v-pills-menusetting-tab">
                                <br>
                                <div class="form-group text-right display_none" id="top_upbtn">
                                    <?php echo form_open('dashboard/web_setting/createmenu', array('id' => 'menuurl')) ?>
                                    <div class="form-group row">
                                        <label for="menuname"
                                            class="col-sm-2 col-form-label"><?php echo display('menu_name') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="menuname" id="menuname" class="form-control" type="text"
                                                placeholder="<?php echo display('menu_name') ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Menuurl"
                                            class="col-sm-2 col-form-label"><?php echo display('menu_url') ?></label>
                                        <div class="col-sm-8">
                                            <input name="Menuurl" id="Menuurl" class="form-control" type="text"
                                                placeholder="<?php echo display('menu_url') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category"
                                            class="col-sm-2 col-form-label"><?php echo display('parent_menu') ?></label>
                                        <div class="col-sm-8">
                                            <select name="menuid" class="form-control" id="menuid">
                                                <option value="" selected disabled><?php echo display('sub_menu') ?>
                                                </option>
                                                <?php if(isset($allmenu )){ ?>
                                                <?php foreach ($allmenu as $menu) { ?>
                                                <option value="<?php echo html_escape($menu->menuid); ?>"
                                                    class='bolden'>
                                                    <strong><?php echo html_escape($menu->menu_name); ?></strong>
                                                </option>
                                                <?php if (!empty($menu->sub)) {
                                                        foreach ($menu->sub as $submenu) { ?>
                                                <option value="0">
                                                    &nbsp;&nbsp;&nbsp;&mdash;<?php echo html_escape($submenu->menu_name); ?>
                                                </option>
                                                <?php }
                                                    }
                                                } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname"
                                            class="col-sm-2 col-form-label"><?php echo display('status') ?></label>
                                        <div class="col-sm-8 customesl">
                                            <select name="status" id="status" class="form-control">
                                                <option value=""><?php echo display('select_option') ?></option>
                                                <option value="1" selected="selected"><?php echo display('active') ?>
                                                </option>
                                                <option value="0"><?php echo display('inactive') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-8 customesl">
                                        <div class="display_none" id="upbtn">
                                            <button type="submit" class="btn btn-success w-md m-b-5"
                                                id="btnchnage"><?php echo display('Ad') ?></button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close() ?>
                                <div class="menusetting_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-subscriberlist-tab"
                                        data-toggle="pill"
                                        href="#v-pills-subscriberlist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-currencylist-tab" data-toggle="pill"
                                        href="#v-pills-currencylist"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-currencylist" role="tabpanel"
                                aria-labelledby="v-pills-currencylist-tab">
                                <div class="currencylist_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-menusetting-tab"
                                        data-toggle="pill"
                                        href="#v-pills-menusetting"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-applicationlist-tab" data-toggle="pill"
                                        href="#v-pills-applicationlist"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-applicationlist" role="tabpanel"
                                aria-labelledby="v-pills-applicationlist-tab">
                                <div class="applicationlist_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-currencylist-tab" data-toggle="pill"
                                        href="#v-pills-currencylist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-commonlist-tab" data-toggle="pill"
                                        href="#v-pills-commonlist"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-commonlist" role="tabpanel"
                                aria-labelledby="v-pills-commonlist-tab">
                                <div class="commonlist_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-applicationlist-tab"
                                        data-toggle="pill"
                                        href="#v-pills-applicationlist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-companies-tab"
                                        data-toggle="pill"
                                        href="#v-pills-companies"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-companies" role="tabpanel"
                                aria-labelledby="v-pills-companies-tab">
                                <div class="companies_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-commonlist-tab" data-toggle="pill"
                                        href="#v-pills-commonlist"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-teammembers-tab" data-toggle="pill"
                                        href="#v-pills-teammembers"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-teammembers" role="tabpanel"
                                aria-labelledby="v-pills-teammembers-tab">
                                <div class="teammembers_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-companies-tab" data-toggle="pill"
                                        href="#v-pills-companies"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-visitor-tab" data-toggle="pill"
                                        href="#v-pills-visitor"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-visitor" role="tabpanel"
                                aria-labelledby="v-pills-visitor-tab">
                                <div class="visitor_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-teammembers-tab"
                                        data-toggle="pill"
                                        href="#v-pills-teammembers"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-teamgallery-tab" data-toggle="pill"
                                        href="#v-pills-teamgallery"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-teamgallery" role="tabpanel"
                                aria-labelledby="v-pills-teamgallery-tab">
                                <div class="teamgallery_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-visitor-tab" data-toggle="pill"
                                        href="#v-pills-visitor"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-contactinfo-tab" data-toggle="pill"
                                        href="#v-pills-contactinfo"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-contactinfo" role="tabpanel"
                                aria-labelledby="v-pills-contactinfo-tab">
                                <div class="contactinfo_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-teamgallery-tab"
                                        data-toggle="pill"
                                        href="#v-pills-teamgallery"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-aboutus-tab" data-toggle="pill"
                                        href="#v-pills-aboutus"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-gallery" role="tabpanel"
                                aria-labelledby="v-pills-gallery-tab">
                                <h4><?php echo display("ad")." ".display("gallery"); ?></h4>
                                <br>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 gallery-inp-hi"><?php echo display('name') ?><span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input name="name" id="gallery_name" class="form-control" type="text"
                                            placeholder="<?php echo display('name') ?>" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 gallery-inp-hi"><?php echo display("image_size") ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input name="width" id="gallery_width" class="form-control" type="number"
                                            placeholder="<?php echo display('width') ?>" value="" required>
                                    </div>
                                    <div class="col-sm-1 text-center gallery-x">X</div>
                                    <div class="col-sm-3">
                                        <input name="height" id="gallery_height" class="form-control" type="number"
                                            placeholder="<?php echo display('height') ?>" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile"
                                        class="col-sm-2 col-form-label gallery-inp-pad"><?php echo display('image') ?><span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" accept="image/*" id="gallery_picture" name="picture" required><a
                                            class="cattooltipsimg" data-toggle="tooltip" data-placement="top"
                                            title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i
                                                class="fa fa-question-circle" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-info w-md m-b-5"
                                            onclick="gallery_save()"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                                <div class="gallery_show"></div><br>

                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-contactinfo-tab"
                                        data-toggle="pill"
                                        href="#v-pills-contactinfo"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-slider-tab" data-toggle="pill"
                                        href="#v-pills-slider"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-slider" role="tabpanel"
                                aria-labelledby="v-pills-slider-tab">
                                <h4><?php echo display("ad")." ".display("slider")." ".display("Image") ?></h4>
                                <br>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 gallery-inp-hi"><?php echo display("image_size") ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input name="width" id="swidth" class="form-control" type="number"
                                            placeholder="<?php echo display('width') ?>" value="" required>
                                    </div>
                                    <div class="col-sm-1 text-center gallery-x">X</div>
                                    <div class="col-sm-3">
                                        <input name="height" id="sheight" class="form-control" type="number"
                                            placeholder="<?php echo display('height') ?>" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2"><?php echo display('image') ?><span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" accept="image/*" required id="spicture" name="picture"><a
                                            class="cattooltipsimg" data-toggle="tooltip" data-placement="top"
                                            title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i
                                                class="fa fa-question-circle" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-info w-md m-b-5"
                                            onclick="sliderimage_save()"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                                <div class="slider_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-gallery-tab" data-toggle="pill"
                                        href="#v-pills-gallery"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-promise-tab" data-toggle="pill"
                                        href="#v-pills-promise"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-promise" role="tabpanel"
                                aria-labelledby="v-pills-promise-tab">
                                <div class="promise_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-slider-tab" data-toggle="pill"
                                        href="#v-pills-slider"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-homeabout-tab" data-toggle="pill"
                                        href="#v-pills-homeabout"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-homeabout" role="tabpanel"
                                aria-labelledby="v-pills-homeabout-tab">
                                <div class="homeabout_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-promise-tab" data-toggle="pill"
                                        href="#v-pills-promise"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-topoffer-tab" data-toggle="pill"
                                        href="#v-pills-topoffer"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-topoffer" role="tabpanel"
                                aria-labelledby="v-pills-topoffer-tab">
                                <div class="topoffer_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-homeabout-tab" data-toggle="pill"
                                        href="#v-pills-homeabout"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-blogoffer-tab" data-toggle="pill"
                                        href="#v-pills-blogoffer"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-blogoffer" role="tabpanel"
                                aria-labelledby="v-pills-blogoffer-tab">
                                <div class="blogoffer_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-topoffer-tab" data-toggle="pill"
                                        href="#v-pills-topoffer"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-roomfeature-tab" data-toggle="pill"
                                        href="#v-pills-roomfeature"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-roomfeature" role="tabpanel"
                                aria-labelledby="v-pills-roomfeature-tab">
                                <div class="roomfeature_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-blogoffer-tab" data-toggle="pill"
                                        href="#v-pills-blogoffer"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-checkout-tab" data-toggle="pill"
                                        href="#v-pills-checkout"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-checkout" role="tabpanel"
                                aria-labelledby="v-pills-checkout-tab">
                                <div class="checkout_show"></div><br>
                                <div class="offset-3 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-roomfeature-tab"
                                        data-toggle="pill"
                                        href="#v-pills-roomfeature"><?php echo display('previous'); ?></a>
                                    <a class="btn btn-success btnNext" id="v-pills-termscondition-tab"
                                        data-toggle="pill"
                                        href="#v-pills-termscondition"><?php echo display('next'); ?></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-footer" role="tabpanel"
                                aria-labelledby="v-pills-footer-tab">
                                <div class="footer_show"></div><br>
                                <div class="offset-4 mb-3 group-end">
                                    <a class="btn btn-danger btnPrevious" id="v-pills-checkout-tab" data-toggle="pill"
                                        href="#v-pills-checkout"><?php echo display('previous'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inline form -->
</div>
<input type="hidden" id="uri" value="<?php echo $this->uri->segment('2'); ?>">
<input type="hidden" id="productmode" value="">
<script src="<?php echo base_url('application/modules/dashboard/assets/js/settings.js?v==3') ?>"></script>