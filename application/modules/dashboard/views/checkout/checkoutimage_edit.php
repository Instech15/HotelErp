<?php echo form_open_multipart("") ?>
<div class="form-group row">
    <label for="c_designation" class="col-sm-4 col-form-label"><?php echo display('title') ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-8">
        <input name="c_name" type="text" class="form-control" id="checkout_title" placeholder="<?php echo display('title') ?>" value="<?php echo html_escape($company_edit->title); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="c_designation" class="col-sm-4 col-form-label"><?php echo display('subtitle') ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-8">
        <input name="subtitle" type="text" class="form-control" id="checkout_subtitle" placeholder="<?php echo display('subtitle') ?>" value="<?php echo html_escape($company_edit->subtitle); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display("image_size") ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-3">
        <input name="width" id="checkout_width" class="form-control" type="number" placeholder="<?php echo display('width') ?>" value="<?php echo html_escape((!empty($company_edit->width) ? $company_edit->width : null)) ?>" required>
    </div>
    <div class="col-sm-1">X</div>
    <div class="col-sm-3">
        <input name="height" id="checkout_height" class="form-control" type="number" placeholder="<?php echo display('height') ?>" value="<?php echo html_escape((!empty($company_edit->height) ? $company_edit->height : null)) ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
    <div class="col-sm-8">
        <input type="file" accept="image/*" id="checkout_picture" name="picture"><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label"></label>
       <div class="col-sm-8">
        <button type="button" class="btn btn-info w-md m-b-5" onclick="checkoutimage_update('<?php echo html_escape($company_edit->slid); ?>')"><?php echo display('update') ?></button>
       </div>
    </div>
    <?php echo form_close(); ?>