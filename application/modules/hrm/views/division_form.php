   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header">
                        <h4><?php echo html_escape((!empty($division->dept_id)?'Update':'Add')) ?> <?php echo display('division') ?></h4>
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/division_controller/division_form') ?>
                    <?php echo form_hidden('dept_id', (!empty($division->dept_id)?$division->dept_id:null)) ?>
            <div class="form-group row">
                        <label for="division_name" class="col-sm-3 col-form-label"><?php echo display('division_name') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                                    <input name="division_name" class="form-control" type="text" placeholder="<?php echo display('division_name') ?>" id="division_name" 
                                    value="<?php echo html_escape((!empty($division->department_name)?$division->department_name:null)) ?>" required >
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="department" class="col-sm-3 col-form-label"><?php echo display('department_name') ?><span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                             <?php echo form_dropdown('parent_id',$department,(!empty($division->parent_id)?$division->parent_id:null),'class="form-control" required') ?>
                        </div>
                    </div> 
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                <?php echo form_close() ?>

            </div>  
        </div>
    </div>
</div>
