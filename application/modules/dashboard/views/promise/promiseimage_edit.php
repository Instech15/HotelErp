<?php echo form_open_multipart("") ?>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display("image_size") ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-3">
        <input name="width" id="promise_width" class="form-control" type="number" placeholder="<?php echo display('width') ?>" value="<?php echo html_escape((!empty($company_edit->width) ? $company_edit->width : null)) ?>" required>
    </div>
    <div class="col-sm-1 gallery-x">X</div>
    <div class="col-sm-3">
        <input name="height" id="promise_height" class="form-control" type="number" placeholder="<?php echo display('height') ?>" value="<?php echo html_escape((!empty($company_edit->height) ? $company_edit->height : null)) ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label slider-img-hi"><?php echo display('image') ?> </label>
    <div class="col-sm-8">
        <input type="file" accept="image/*" id="promise_picture" name="picture"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label"></label>
       <div class="col-sm-8">
        <button type="button" class="btn btn-info w-md m-b-5" onclick="promiseimage_update('<?php echo html_escape($company_edit->slid); ?>')"><?php echo display('update') ?></button>
       </div>
    </div>
    <?php echo form_close(); ?>

    <script src="<?php echo base_url('application/modules/dashboard/assets/js/initialize_tooltip.js'); ?>"
    type="text/javascript"></script>