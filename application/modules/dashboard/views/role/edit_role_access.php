<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:"Edit Role")) ?></h4>

            <div class="card-body">
                <?php echo form_open("dashboard/role/update_access_role", array('name'=>'role_acc')); ?>

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
                    <label for="role_id" class="col-sm-3 col-form-label"><?php echo display('role') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <?php foreach($role as $val){ 
                                    $ck = $this->db->where('fk_user_id',$info->fk_user_id)->where('fk_role_id',$val->role_id)->get('sec_user_access_tbl')->num_rows();
                                ?>
                        <label class="radio-inline">
                            <input type="checkbox" name="role[]" <?php echo ($ck?'checked':'')?>
                                value="<?php echo html_escape($val->role_id);?>">
                            <?php echo html_escape($val->role_name);?>
                        </label>
                        <?php } ?>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save_btn save"><?php echo display('update')?></button>
                </div>


                <!-- </form>  -->
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>

<input type="hidden" id="fk_user" value="<?php echo html_escape($info->fk_user_id);?>">
<input type="hidden" id="fk_role" value="<?php echo html_escape($info->fk_role_id);?>">
<script src="<?php echo MOD_URL.$module;?>/assets/js/editRoleAccess.js"></script>