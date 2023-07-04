<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">
                <?php echo form_open('room_setting/booking_type/complementary_create'); ?>
                <?php echo form_hidden('complementary_id', (!empty($intinfo->complementary_id)?$intinfo->complementary_id:null)) ?>
                <div class="form-group row">
                    <label for="roomtype" class="col-sm-4 col-form-label"><?php echo display('roomtype') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control basic-single" required name="roomtype" id="roomtype">
                            <option value="" selected="selected"><?php echo display('please_select_one') ?></option>
                            <?php foreach ($roomtype as $ltype) {?>
                            <option value="<?php echo html_escape($ltype->roomtype) ?>"
                                <?php if(!empty($intinfo)){if($intinfo->roomtype==$ltype->roomtype){echo "Selected";}} else{echo "Selected";} ?>>
                                <?php echo html_escape($ltype->roomtype);?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="complementaryname" class="col-sm-4 col-form-label"><?php echo display('complementary') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="complementaryname" autocomplete="off" class="form-control" type="text"
                            value="<?php echo html_escape((!empty($intinfo->complementaryname)?$intinfo->complementaryname:null)) ?>"
                            placeholder="<?php echo display('complementary') ?>" id="complementaryname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rate" class="col-sm-4 col-form-label"><?php echo display('name') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="rate" autocomplete="off" min="0" class="form-control" type="number"
                            value="<?php echo html_escape((!empty($intinfo->rate)?$intinfo->rate:null)) ?>"
                            placeholder="<?php echo display('s_rate') ?>" id="rate" required>
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