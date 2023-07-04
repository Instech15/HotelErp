<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">

                    <?php echo form_open('units/unitmeasurement/create'); ?>

                    <?php echo form_hidden('id', (!empty($unitinfo->id)?$unitinfo->id:null)) ?>
                        <div class="form-group row">
                            <label for="unit_name" class="col-sm-3 col-form-label"><?php echo display('unit_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="unitname" class="form-control" type="text" placeholder="<?php echo display('unit_name') ?>" id="unitname" value="<?php echo html_escape((!empty($unitinfo->uom_name)?$unitinfo->uom_name:null)) ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit_short_name" class="col-sm-3 col-form-label"><?php echo display('unit_short_name') ?></label>
                            <div class="col-sm-9">
                                 <input name="shortname" class="form-control" type="text" placeholder="<?php echo display('unit_short_name') ?>" id="shortname" value="<?php echo html_escape((!empty($unitinfo->uom_short_code)?$unitinfo->uom_short_code:null)) ?>">
                            </div>
                        </div> 
						<div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-9">
                            <select name="status"  class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1" <?php if(!empty($unitinfo)){if($unitinfo->is_active==1){echo "Selected";}} ?>><?php echo display('active') ?></option>
                                <option value="0" <?php if(!empty($unitinfo)){if($unitinfo->is_active==0){echo "Selected";}} ?>><?php echo display('inactive') ?></option>
                              </select>
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