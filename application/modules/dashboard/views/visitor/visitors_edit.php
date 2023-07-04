<?php echo form_open(""); ?>
<div class="form-group row">
    <label for="c_name" class="col-sm-3"><?php echo display("number") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="c_name" type="text" class="form-control" id="visitor_c_name" placeholder="<?php echo display("number") ?>" value="<?php echo html_escape($teammember_edit->title); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="c_name" class="col-sm-3"><?php echo display('description') ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <textarea name="c_desc" type="text" class="form-control" id="visitor_c_desc" rows="7" placeholder="<?php echo display('description') ?>"  required><?php echo html_escape($teammember_edit->subtitle); ?></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="c_designation" class="col-sm-3"><?php echo display("increment") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="c_designation" type="text" class="form-control" id="visitor_c_designation" placeholder="<?php echo display("increment") ?>" value="<?php echo html_escape($teammember_edit->link1); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-3"></label>
    <div class="col-sm-9">
        <button type="button" class="btn btn-info w-md m-b-5" onclick="visitors_update('<?php echo html_escape($teammember_edit->slid) ?>')"><?php echo display('update') ?></button>
    </div>
</div>
<?php echo form_close(); ?>