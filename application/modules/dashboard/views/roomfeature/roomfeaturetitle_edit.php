<?php echo form_open(""); ?>
<div class="form-group row">
    <label for="c_designation" class="col-sm-3"><?php echo display('title') ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="title" type="text" class="form-control" id="roomfeature_title" placeholder="<?php echo display('name') ?>" value="<?php echo html_escape($teammember_edit->widget_title); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="c_designation" class="col-sm-3"></label>
    <div class="col-sm-9">
        <button type="button" class="btn btn-info w-md m-b-5" onclick="roomfeaturetitle_update('<?php echo html_escape($teammember_edit->widgetid) ?>')"><?php echo display('update') ?></button>
    </div>
    </div>
    <?php echo form_close(); ?>