<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            
            <div class="panel-body">
                <?php echo form_open('room_facilities/room_size/create') ?>
                <?php echo form_hidden('mesurementid', (!empty($intinfo->mesurementid)?$intinfo->mesurementid:null)) ?>
                <div class="form-group row">
                    <label for="room_size" class="col-sm-4 col-form-label"><?php echo display('room_size') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="room_size" class="form-control" type="text" placeholder="Add <?php echo display('room_size') ?>" id="tablename" value="<?php echo html_escape((!empty($intinfo->roommesurementitle)?$intinfo->roommesurementitle:null)) ?>">
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