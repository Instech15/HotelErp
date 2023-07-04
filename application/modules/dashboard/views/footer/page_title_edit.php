<?php echo form_open(""); ?>
<div class="form-group row">
    <label for="home" class="col-sm-3"><?php echo display("home") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="home" type="text" class="form-control" id="home" placeholder="<?php echo display("home") ?>" value="<?php echo html_escape($teammember_edit->home); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="aboutus" class="col-sm-3"><?php echo display("about_us") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="aboutus" type="text" class="form-control" id="aboutus" placeholder="<?php echo display("about_us") ?>" value="<?php echo html_escape($teammember_edit->aboutus); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="contactus" class="col-sm-3"><?php echo display("contact_us") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="contactus" type="text" class="form-control" id="contactus" placeholder="<?php echo display("contact_us") ?>" value="<?php echo html_escape($teammember_edit->contactus); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="gallery" class="col-sm-3"><?php echo display("gallery") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="gallery" type="text" class="form-control" id="gallery" placeholder="<?php echo display("gallery") ?>" value="<?php echo html_escape($teammember_edit->gallery); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="roomlist" class="col-sm-3"><?php echo display("room_list") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="roomlist" type="text" class="form-control" id="roomlist" placeholder="<?php echo display("room_list") ?>" value="<?php echo html_escape($teammember_edit->roomlist); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="roomdetails" class="col-sm-3"><?php echo display("room_detail") ?> <i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <input name="roomdetails" type="text" class="form-control" id="roomdetails" placeholder="<?php echo display("room_detail") ?>" value="<?php echo html_escape($teammember_edit->roomdetails); ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-3"></label>
    <div class="col-sm-9">
        <button type="button" class="btn btn-info w-md m-b-5" onclick="page_title_update('<?php echo html_escape($teammember_edit->pageid ) ?>')"><?php echo display('update') ?></button>
    </div>
    </div>
    <?php echo form_close(); ?>