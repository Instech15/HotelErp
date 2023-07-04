<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">
                <?php echo form_open('room_setting/promo_code/create') ?>
                <?php echo form_hidden('promocodeid', (!empty($intinfo->promocodeid)?$intinfo->promocodeid:null)) ?>
                <input name="promocodeid" type="hidden" value="<?php echo html_escape($intinfo->promocodeid) ?>"
                            id="promocodeid">
                <div class="form-group row">
                    <label for="roomid" class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('roomid',$roomlist,$roomlist=$intinfo->roomid, 'class=" form-control" data-live-search="true" id="roomid"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="start_date" class="col-sm-4 col-form-label"><?php echo display('start_date') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="startdate" autocomplete="off" class="form-control datepickers" type="text"
                            placeholder="<?php echo display('start_date') ?>"
                            value="<?php echo html_escape((!empty($intinfo->startdate)?$intinfo->startdate:null)) ?>"
                            id="start_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="end_date" class="col-sm-4 col-form-label"><?php echo display('end_date') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="enddate" autocomplete="off" class="form-control datepickers" type="text"
                            placeholder="<?php echo display('end_date') ?>"
                            value="<?php echo html_escape((!empty($intinfo->enddate)?$intinfo->enddate:null)) ?>"
                            id="end_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="promocode" class="col-sm-4 col-form-label"><?php echo display('promocode') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="promocode" class="form-control" type="text"
                            placeholder="<?php echo display('promocode') ?>"
                            value="<?php echo html_escape((!empty($intinfo->promocode)?$intinfo->promocode:null)) ?>"
                            required>
                        <input name="old_promocode" class="form-control" type="text"
                            placeholder="<?php echo display('promocode') ?>"
                            value="<?php echo html_escape((!empty($intinfo->promocode)?$intinfo->promocode:null)) ?>"
                            hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="discount" class="col-sm-4 col-form-label"><?php echo display('discount') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="discount" class="form-control" type="text"
                            placeholder="<?php echo display('discount') ?>"
                            value="<?php echo html_escape((!empty($intinfo->discount)?$intinfo->discount:null)) ?>"
                            required>
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <option value="" selected="selected"><?php echo display('select_option') ?></option>
                            <option value="1" <?php if(!empty($intinfo)){if($intinfo->status==1){echo "Selected";}} ?>>
                                <?php echo display('used') ?></option>
                            <option value="0" <?php if(!empty($intinfo)){if($intinfo->status==0){echo "Selected";}} ?>>
                                <?php echo display('available') ?></option>
                        </select>
                    </div>
                </div>

                <?php if($intinfo->status==0) { ?>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php } ?>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>