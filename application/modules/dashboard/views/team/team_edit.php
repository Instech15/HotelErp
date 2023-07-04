<?php echo form_open_multipart("") ?>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display("name") ?> </label>
    <div class="col-sm-8">
        <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>"
            id="team_title" value="<?php echo html_escape((!empty($intinfo->title)?$intinfo->title:null)) ?>">
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display("image_size") ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-3">
        <input name="width" id="team_width" class="form-control" type="number"
            placeholder="<?php echo display('width') ?>"
            value="<?php echo html_escape((!empty($intinfo->width)?$intinfo->width:null)) ?>" required>
    </div>
    <div class="col-sm-1">X</div>
    <div class="col-sm-3">
        <input name="height" id="team_height" class="form-control" type="number"
            placeholder="<?php echo display('height') ?>"
            value="<?php echo html_escape((!empty($intinfo->height)?$intinfo->height:null)) ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="subtitle" class="col-sm-4 col-form-label"><?php echo display("position") ?> </label>
    <div class="col-sm-8">
        <input name="subtitle" class="form-control" type="text" placeholder="<?php echo display('position') ?>"
            id="team_subtitle" value="<?php echo html_escape((!empty($intinfo->subtitle)?$intinfo->subtitle:null)) ?>">
    </div>
</div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
    <div class="col-sm-8">
        <input type="file" accept="image/*" id="team_picture" name="picture"><a class="cattooltipsimg"
            data-toggle="tooltip" data-placement="top"
            title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i class="fa fa-question-circle"
                aria-hidden="true"></i></a>
    </div>
</div>
<div class="form-group row">
    <label for="link1" class="col-sm-4 col-form-label"><?php echo display("image_text") ?> </label>
    <div class="col-sm-8">
        <input name="link1" class="form-control" type="text" placeholder="<?php echo display("image_text") ?>"
            value="<?php echo html_escape((!empty($intinfo->slink) ? $intinfo->slink : null)) ?>" id="url">
    </div>
</div>
<div class="form-group row">
    <label for="link1" class="col-sm-4 col-form-label"><?php echo display("facebook") ?> </label>
    <div class="col-sm-8">
        <input name="link1" class="form-control" type="text" placeholder="<?php echo display("facebook") ?>"
            value="<?php echo html_escape((!empty($intinfo->link1) ? $intinfo->link1 : null)) ?>" id="link1">
    </div>
</div>
<div class="form-group row">
    <label for="link2" class="col-sm-4 col-form-label"><?php echo display("twitter") ?> </label>
    <div class="col-sm-8">
        <input name="link2" class="form-control" type="text" placeholder="<?php echo display("twitter") ?>"
            value="<?php echo html_escape((!empty($intinfo->link2) ? $intinfo->link2 : null)) ?>" id="link2">
    </div>
</div>
<div class="form-group row">
    <label for="link3" class="col-sm-4 col-form-label"><?php echo display("instragram") ?> </label>
    <div class="col-sm-8">
        <input name="link3" class="form-control" type="text" placeholder="<?php echo display("instragram") ?>"
            value="<?php echo html_escape((!empty($intinfo->link3) ? $intinfo->link3 : null)) ?>" id="link3">
    </div>
</div>
<div class="form-group row">
    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
    <div class="col-sm-8 customesl">
        <select name="status" id="status1" class="form-control">
            <option value="" selected="selected"><?php echo display('select_option') ?></option>
            <option value="1" <?php if (!empty($intinfo)) { if ($intinfo->status == 1) { echo "Selected"; }} ?>>
                <?php echo display('active') ?></option>
            <option value="0" <?php if (!empty($intinfo)) { if ($intinfo->status == 0) {echo "Selected"; }} ?>>
                <?php echo display('inactive') ?></option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="lastname" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8 customesl">
        <button type="button" class="btn btn-info w-md m-b-5"
            onclick="team_update('<?php echo html_escape($intinfo->slid) ?>')"><?php echo display('update') ?></button>
    </div>
</div>
<?php echo form_close(); ?>