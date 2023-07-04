<?php echo form_open_multipart("") ?>
<div class="form-group row">
    <label for="title" class="col-sm-3 col-form-label"><?php echo display("title") ?> <span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <input name="width" id="contact_width" class="form-control" type="text" placeholder="<?php echo display("title") ?>"
            value="<?php echo html_escape((!empty($company_edit->title) ? $company_edit->title : null)) ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-3 col-form-label"><?php echo display("description") ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-9">
        <textarea name="height" id="contact_height" rows="7" class="form-control" type="text"
            placeholder="<?php echo display("description") ?>"
             required><?php echo html_escape((!empty($company_edit->subtitle) ? $company_edit->subtitle : null)) ?></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9">
        <button type="button" class="btn btn-info w-md m-b-5"
            onclick="contactinfo_infoupdate('<?php echo html_escape($company_edit->slid); ?>')"><?php echo display('update') ?></button>
    </div>
</div>
<?php echo form_close(); ?>