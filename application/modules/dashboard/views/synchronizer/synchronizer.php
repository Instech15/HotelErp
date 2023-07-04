<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
            </div>
            <div class="panel-body">
 
                <div id="message" class="alert hide"></div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo display('internet_connection') ?></label>
                    <div class="col-sm-9">  
                        <?php echo (($internet)? "<i class='fa fa-check text-success'></i> ".display('ok') : "<i class='fa fa-times text-danger'></i> ".display('not_available') ) ?>
                    </div> 
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo display('outgoing_file') ?></label>
                    <div class="col-sm-9">  
                        <?php echo (($outgoing)? "<i class='fa fa-check text-success'></i> ".display('available') : "<i class='fa fa-times text-danger'></i> ".display('not_available')) ?>
                    </div> 
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo display('incoming_file') ?></label>
                    <div class="col-sm-9">  
                        <?php echo (($incoming)? "<i class='fa fa-check text-success'></i> ".display('available') : "<i class='fa fa-times text-danger'></i> ".display('not_available')) ?>
                    </div> 
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">  
                        <?php if (!$incoming) { ?>
                            <button type="submit" id="download" class="btn btn-primary w-md m-b-5 btn-block"><i class="fa fa-download"><?php echo display('download') ?></i> <?php echo display('download_data_from_server') ?> </button>
                        <?php } else { ?>
                            <button type="submit" id="import" class="btn btn-info w-md m-b-5 btn-block"><i class="fa fa-database"><?php echo display('download') ?></i> <?php echo display('data_import_to_database') ?></button>
                        <?php } ?>

                        <?php if ($outgoing) { ?>
                            <button type="submit" id="upload" class="btn btn-success w-md m-b-5 btn-block"><i class="fa fa-upload"><?php echo display('upload') ?></i> <?php echo display('data_upload_to_server') ?></button>
                        <?php } ?>
                    </div>  
                </div>  

            </div>
        </div>
    </div>
</div>
<input type="hidden" id="csrfToken" value="<?php echo $this->security->get_csrf_token_name(); ?>:<?php echo $this->security->get_csrf_hash(); ?>">

<script src="<?php echo MOD_URL.$module;?>/assets/js/sunchronizer.js"></script>


