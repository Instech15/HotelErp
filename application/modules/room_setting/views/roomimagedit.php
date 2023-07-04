<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            
            <div class="card-body">
                <?php echo form_open_multipart('room_setting/room_images/create') ?>
                <?php echo form_hidden('room_img_id', (!empty($intinfo->room_img_id)?$intinfo->room_img_id:null)) ?>
                <div class="form-group row">
                    <label for="room_name" class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('room_name',$allrooms,$allrooms=$intinfo->room_id, 'class="selectpicker form-control" data-live-search="true" id="room_name"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-4 col-form-label"><?php echo display('image') ?></label>
                    <div class="col-sm-8">
                        <input type="file" accept="image/*" name="picture" onchange="loadFile(event)"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                        <small id="fileHelp" class="text-muted"><img src="<?php echo html_escape(base_url(!empty($intinfo->room_imagename)?$intinfo->room_imagename:'assets/img/room-setting/room_images.png')); ?>" id="output" class="img-thumbnail height_150_width_200px"/>
                        </small>
                        <input type="hidden" name="old_image" value="<?php echo html_escape(base_url(!empty($intinfo->room_imagename)?$intinfo->room_imagename:'assets/img/room-setting/room_images.png')); ?>">
                    </div>
                </div>
                
                
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/roomImage.js"></script>