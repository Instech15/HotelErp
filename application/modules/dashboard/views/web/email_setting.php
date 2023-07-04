<div class="card">
     <div class="row">
         <div class="col-sm-12">
             <div class="card-header">
                 <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
             </div>
             <div class="card-body">
                 <h5><?php echo "Sending Email" ?></h5>
                 <?php
                    $permission = $this->db->select("*")->from("tbl_email_permission")->get()->result();
                    ?>
                 <?php foreach($permission as $list){ ?>
                 <div class="form-group row">
                     <label for="<?php echo $list->permission; ?>"
                         class="col-sm-3 col-form-label"><?php echo ucfirst($list->permission);?></label>
                     <div class="col-sm-2">
                         <input name="<?php echo $list->permission; ?>" type="checkbox" class="form-control list"
                             id="<?php echo $list->permission; ?>" <?php if($list->status==1){echo "checked";} ?> value="<?php echo html_escape($list->status);?>">
                     </div>
                 </div>
                 <?php } ?>
             </div>
             <div class="card-body">
                 <h5><?php echo "SMTP Setting" ?></h5>
                 <?php				
				echo form_open_multipart('dashboard/web_setting/email_config_save','class="form-inner"') ?>
                 <?php echo form_hidden('email_config_id',$config->email_config_id) ?>
                 <div class="form-group row">
                     <label for="address" class="col-sm-3 col-form-label"><?php echo"Protocol";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input name="protocol" type="text" class="form-control" id="address"
                             placeholder="<?php echo "Protocol"; ?>"
                             value="<?php echo html_escape($config->protocol);?>" required>
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="email" class="col-sm-3 col-form-label"><?php echo "MailPath ";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input name="mailpath" type="text" class="form-control" id="email"
                             placeholder="<?php echo "MailPath ";?>"
                             value="<?php echo html_escape($config->mailpath);?>" required>
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="phone" class="col-sm-3 col-form-label"><?php echo "MailType";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input name="mailtype" type="text" class="form-control" id="mailtype"
                             placeholder="<?php echo "MailType";?>" value="<?php echo html_escape($config->mailtype);?>"
                             required>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-sm-3 col-form-label"> <?php echo "Smtp Host";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input type="text" name="smtp_host" value="<?php echo html_escape($config->smtp_host);?>"
                             required="1" class="form-control">
                     </div>
                 </div>

                 <div class="form-group row">
                     <label class="col-sm-3 col-form-label"> <?php echo "Smtp Port";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input type="text" name="smtp_port" value="<?php echo html_escape($config->smtp_port);?>"
                             required="1" class="form-control">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-sm-3 col-form-label"> <?php echo "Sender Email";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input type="text" name="sender" value="<?php echo html_escape($config->sender);?>"
                             required="1" class="form-control" required>
                     </div>
                 </div>

                 <div class="form-group row">
                     <label class="col-sm-3 col-form-label"> <?php echo "Smtp Password";?><span
                             class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input type="password" name="smtp_password"
                             value="<?php echo html_escape($config->smtp_password);?>" required="1" class="form-control"
                             required>
                     </div>
                 </div>
                 <?php if(!empty($config->secure_image)) {  ?>
                 <div class="form-group row">
                     <label for="logoPreview" class="col-sm-3 col-form-label"></label>
                     <div class="col-sm-6">
                         <img src="<?php echo base_url(html_escape($config->secure_image)) ?>" width="500" alt="Picture"
                             class=" border-2 img-thumbnail" />
                         <p> Note: Turn On Less Secure App Access from Gmail Setting</p>
                     </div>
                 </div>
                 <?php } ?>
                 <div class="form-group row">
                     <label for="secure_image" class="col-sm-3 col-form-label"><?php echo "Secure App Image"; ?></label>
                     <div class="col-sm-6">
                         <input type="file" name="secure_image" id="login_secure_imagelogo">
                         <input type="hidden" name="old_secure_image"
                             value="<?php echo html_escape($config->secure_image) ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-sm-3 col-form-label"> <span class=""></span></label>
                     <div class="col-sm-6">
                         <button type="submit"
                             class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                     </div>
                 </div>
                 <?php echo form_close() ?>
             </div>
         </div>
     </div>
 </div>
 <script src="<?php echo MOD_URL.$module;?>/assets/js/email_setting.js"></script>