<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            
            <div class="panel-body">
                <?php echo form_open('room_setting/starclass/create'); ?>
                <?php echo form_hidden('starcalssid', (!empty($intinfo->starcalssid)?$intinfo->starcalssid:null)) ?>
                
                <div class="form-group row">
                    <label for="class_name" class="col-sm-4 col-form-label"><?php echo display('class_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="class_name" class="form-control" type="text" placeholder="Add <?php echo display('class_name') ?>" id="class_name" value="<?php echo html_escape((!empty($intinfo->starclassname)?$intinfo->starclassname:null)) ?>" required>
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