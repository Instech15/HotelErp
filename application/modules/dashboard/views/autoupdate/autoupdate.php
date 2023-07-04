<link href="<?php echo base_url('application/modules/dashboard/assets/css/autoupdate.css'); ?>" rel="stylesheet"
    type="text/css" />
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <?php if ($latest_version>$current_version) { ?>
                <?php echo form_open_multipart("dashboard/autoupdate/update") ?>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="form-group col-sm-8 col-sm-offset-2">
                        <blink class="text-success text-center"
                            style="font-size: 32px;margin-bottom: 36px;display: block;"><?php echo @$message_txt ?>
                        </blink>
                        <blink class="text-waring text-center"
                            style="font-size: 32px;margin-bottom: 36px;display: block;"><?php echo @$exception_txt ?>
                        </blink>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="alert alert-success text-center"
                                    style="font-size:18px;    line-height: 28px;"><?php echo "Latest version"; ?>
                                    <br>V-<?php echo $latest_version ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="alert alert-danger text-center"
                                    style="font-size:18px;    line-height: 28px;"><?php echo "Current version"; ?>
                                    <br>V-<?php echo $current_version ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div id="checkserver">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="form-group col-sm-6 col-md-offset-3">
                            <p class="alert" id="errormsg" class="autoupdate_line_font_doted">
                                <?php echo "Before Update Check Your Server requirement for Update script.Check Your server php allow_url_fopen is enable,memory Limit More than 100M and max execution time is 300 or more";?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success" onclick="checkserver()"><i
                                    class="fa fa-wrench" aria-hidden="true"></i> <?php echo "Check server";?></button>
                            <button type="button" class="btn btn-success"
                                onclick="autoupdateoff(<?php echo $latest_version;?>)"><i class="fa fa-close"
                                    aria-hidden="true"></i>
                                <?php 
                                    $notification = $this->db->select("*")->from("tbl_version_checker")->get()->row();
                                    if($notification->disable==0 | $notification->version!=$latest_version){ 
                                        echo "Notification Off";
                                    }else{
                                        echo "Notification On";
                                    } ?>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="serverok" class="autoupdate_d_none">
                    <div class="row">
                        <div class="form-group col-sm-2">
                        </div>
                        <div class="form-group col-sm-8 col-sm-offset-3">
                            <p class="alert" class="autoupdate_line_font_doted"><?php echo "Note: If you want to update software,you
                                must have immediate previous version."; ?></p>
                            <p class="alert"
                                style="color:#8a4246;background-color:#ffedb6;border: 2px dotted #ffd479;;border-radius:5px;padding:15px;margin-bottom:20px;">
                                note: strongly recomanded to backup your <b>SOURCE FILE</b> and <b>DATABASE</b> before
                                update.</p>
                            <p><a href="<?php echo base_url()?>dashboard/autoupdate/download_backup"
                                    class="btn btn-success col-sm-offset-5"><i class="fa fa-database"
                                        aria-hidden="true"></i> Download Database</a></p>
                        </div>
                        <div class="form-group col-sm-2">
                        </div>
                        <div class="form-group col-sm-2">
                        </div>
                        <div class="form-group col-sm-4 col-sm-offset-3">
                            <label><?php echo display('lic_pur_key')?><span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="<?php echo display('lic_pur_key')?>"
                                name="purchase_key" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label><?php echo "Select Version";?><span class="text-danger">*</span></label>
                            <select name="version" class="form-control" required>
                                <option value="" selected="selected"><?php echo display('select_option') ?></option>
                                <?php $start=$latest_version-0.4;
								for($i=$current_version+0.1;$i<$latest_version+0.1;$i+=0.1){
								?>
                                <option value="<?php echo number_format((float)$i, 1, '.', '');?>">
                                    <?php echo "Xainhotelv".number_format((float)$i, 1, '.', '');?></option>
                                <?php } ?>

                            </select>
                            <p><a href="https://forum.bdtask.com" target="_blank">Do you Need support?</a> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success col-sm-offset-5"
                                onclick="return confirm('are you sure want to update?')"><i class="fa fa-wrench"
                                    aria-hidden="true"></i> Update</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>

                    <?php } else{  ?>
                    <div class="row">
                        <div class="form-group col-sm-4">
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="alert alert-success text-center" style="font-size:18px;    line-height: 28px;">
                                Current version
                                <br>V-<?php echo $current_version ?>
                            </div>
                            <h2 class="text-center">No Update available</h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/form.js'); ?>" type="text/javascript">
</script>