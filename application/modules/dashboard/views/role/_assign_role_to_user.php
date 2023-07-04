<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            <?php echo form_open("dashboard/role/save_role_access") ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="user_id" class="col-sm-3 col-form-label"><?php echo display('user') ?> <span
                    class="text-danger">*</span></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="user_id" id="user_id" required="">
                            <option value="">--Select--</option>
                            <?php
                            foreach($user as $val){
                            echo '<option value="'.html_escape($val->id).'">'.html_escape($val->firstname).' '.html_escape($val->lastname).'.</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role_id" class="col-sm-3 col-role-label"><?php echo display('role') ?> <span
                    class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <?php foreach($role as $val){ ?>
                        <label class="radio-inline">
                            <input type="checkbox" name="role[]" value="<?php echo html_escape($val->role_id);?>">
                            <?php echo html_escape($val->role_name);?>
                        </label>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group row text-right">
                    <label for="user_id" class="col-sm-3 col-form-label"><span class="text-danger"></span></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>