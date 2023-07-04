<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <?php echo form_open('room_setting/bed_type/create') ?>
                    <?php echo form_hidden('Bedstypeid', (!empty($intinfo->Bedstypeid)?$intinfo->Bedstypeid:null)) ?>
                        <div class="form-group row">
                            <label for="bed_name" class="col-sm-4 col-form-label"><?php echo display('bed_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="bed_name" class="form-control" type="text" placeholder="<?php echo display('bed_name') ?>" id="tablename" value="<?php echo html_escape((!empty($intinfo->bedstypetitle)?$intinfo->bedstypetitle:null)) ?>" required>
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