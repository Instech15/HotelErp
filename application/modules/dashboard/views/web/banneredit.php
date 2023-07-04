
<?php if($intinfo->Sltypeid!=5){ ?>
<?php echo form_open_multipart('dashboard/web_setting/updatebanner') ?>
<?php echo form_hidden('slid', (!empty($intinfo->slid)?$intinfo->slid:null)) ?>
<div class="form-group row">
    <input name="sliderimage" type="hidden" value="<?php echo html_escape($intinfo->image);?>" />
    <label for="ptype" class="col-sm-4 col-form-label"><?php echo display('banner_type') ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-8 customesl">
        <?php if(empty($type)){$type = array('' => '--Select--');}
						echo form_dropdown('banner_type',$type,(!empty($intinfo->Sltypeid)?$intinfo->Sltypeid:null),'class="form-control" id="ptype" required') ?>
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display('bannersize') ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-3">
        <input name="width" class="form-control" type="number" placeholder="<?php echo display('width') ?>"
            value="<?php echo html_escape((!empty($intinfo->width)?$intinfo->width:null)) ?>" required>
    </div>
    <div class="col-sm-1">X</div>
    <div class="col-sm-3">
        <input name="height" class="form-control" type="number" placeholder="<?php echo display('height') ?>"
            value="<?php echo html_escape((!empty($intinfo->height)?$intinfo->height:null)) ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display('title') ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-8">
        <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>"
            value="<?php echo html_escape((!empty($intinfo->title)?$intinfo->title:null)) ?>">
    </div>
</div>
<div class="form-group row">
    <label for="subtitle" class="col-sm-4 col-form-label"><?php echo display('subtitle') ?> </label>
    <div class="col-sm-8">
        <input name="subtitle" class="form-control" type="text" placeholder="<?php echo display('subtitle') ?>"
            id="subtitle" value="<?php echo html_escape((!empty($intinfo->subtitle)?$intinfo->subtitle:null)) ?>">
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
    <div class="col-sm-8">
        <input type="file" accept="image/*" name="picture"><a class="cattooltipsimg" data-toggle="tooltip"
            data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i
                class="fa fa-question-circle" aria-hidden="true"></i></a>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-4 col-form-label"><?php echo display('link_url') ?> </label>
    <div class="col-sm-8">
        <input name="url" class="form-control" type="text" placeholder="<?php echo display('link_url') ?>"
            value="<?php echo html_escape((!empty($intinfo->slink)?$intinfo->slink:null)) ?>" id="url">
    </div>
</div>
<div class="form-group row">
    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
    <div class="col-sm-8 customesl">
        <select name="status" class="form-control">
            <option value="" selected="selected"><?php echo display('select_option') ?></option>
            <option value="1" <?php if(!empty($intinfo)){if($intinfo->status==1){echo "Selected";}} ?>>
                <?php echo display('active') ?></option>
            <option value="0" <?php if(!empty($intinfo)){if($intinfo->status==0){echo "Selected";}} ?>>
                <?php echo display('inactive') ?></option>
        </select>
    </div>
</div>
<div class="form-group text-right">
    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
</div>
<?php echo form_close() ?>
<?php }else{ ?>
    <?php echo form_open_multipart('dashboard/web_setting/updatebanner') ?>
<?php echo form_hidden('slid', (!empty($intinfo->slid)?$intinfo->slid:null)) ?>
<div class="form-group row">
    <input name="sliderimage" type="hidden" value="<?php echo html_escape($intinfo->image);?>" />
    <label for="ptype" class="col-sm-4 col-form-label"><?php echo display('banner_type') ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-8 customesl">
        <?php if(empty($type)){$type = array('' => '--Select--');}
						echo form_dropdown('banner_type',$type,(!empty($intinfo->Sltypeid)?$intinfo->Sltypeid:null),'class="form-control" id="ptype" required') ?>
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display('bannersize') ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-3">
        <input name="width" class="form-control" type="number" placeholder="<?php echo display('width') ?>"
            value="<?php echo html_escape((!empty($intinfo->width)?$intinfo->width:null)) ?>" required>
    </div>
    <div class="col-sm-1">X</div>
    <div class="col-sm-3">
        <input name="height" class="form-control" type="number" placeholder="<?php echo display('height') ?>"
            value="<?php echo html_escape((!empty($intinfo->height)?$intinfo->height:null)) ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label"><?php echo display('title') ?> <span
            class="text-danger">*</span></label>
    <div class="col-sm-8">
        <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>"
            value="<?php echo html_escape((!empty($intinfo->title)?$intinfo->title:null)) ?>">
    </div>
</div>
<div class="form-group row">
    <label for="subtitle" class="col-sm-4 col-form-label"><?php echo display('subtitle') ?> </label>
    <div class="col-sm-8">
        <input name="subtitle" class="form-control" type="text" placeholder="<?php echo display('subtitle') ?>"
            id="subtitle" value="<?php echo html_escape((!empty($intinfo->subtitle)?$intinfo->subtitle:null)) ?>">
    </div>
</div>
<div class="form-group row">
    <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
    <div class="col-sm-8">
        <input type="file" accept="image/*" name="picture"><a class="cattooltipsimg" data-toggle="tooltip"
            data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images with Size: 1920X902"><i
                class="fa fa-question-circle" aria-hidden="true"></i></a>
    </div>
</div>
<div class="form-group row">
    <label for="link1" class="col-sm-4 col-form-label"><?php echo display('link1') ?> </label>
    <div class="col-sm-8">
        <input name="link1" class="form-control" type="text" placeholder="<?php echo display('link1') ?>"
            value="<?php echo html_escape((!empty($intinfo->link1)?$intinfo->link1:null)) ?>" id="link1">
    </div>
</div>
<div class="form-group row">
    <label for="link2" class="col-sm-4 col-form-label"><?php echo display('link2') ?> </label>
    <div class="col-sm-8">
        <input name="link2" class="form-control" type="text" placeholder="<?php echo display('link2') ?>"
            value="<?php echo html_escape((!empty($intinfo->link2)?$intinfo->link2:null)) ?>" id="link2">
    </div>
</div>
<div class="form-group row">
    <label for="link3" class="col-sm-4 col-form-label"><?php echo display('link3') ?> </label>
    <div class="col-sm-8">
        <input name="link3" class="form-control" type="text" placeholder="<?php echo display('link3') ?>"
            value="<?php echo html_escape((!empty($intinfo->link3)?$intinfo->link3:null)) ?>" id="link3">
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-4 col-form-label"><?php echo display('link_url') ?> </label>
    <div class="col-sm-8">
        <input name="url" class="form-control" type="text" placeholder="<?php echo display('link_url') ?>"
            value="<?php echo html_escape((!empty($intinfo->slink)?$intinfo->slink:null)) ?>" id="url">
    </div>
</div>
<div class="form-group row">
    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
    <div class="col-sm-8 customesl">
        <select name="status" class="form-control">
            <option value="" selected="selected"><?php echo display('select_option') ?></option>
            <option value="1" <?php if(!empty($intinfo)){if($intinfo->status==1){echo "Selected";}} ?>>
                <?php echo display('active') ?></option>
            <option value="0" <?php if(!empty($intinfo)){if($intinfo->status==0){echo "Selected";}} ?>>
                <?php echo display('inactive') ?></option>
        </select>
    </div>
</div>
<div class="form-group text-right">
    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
</div>
<?php echo form_close() ?>
<?php } ?>

<script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>