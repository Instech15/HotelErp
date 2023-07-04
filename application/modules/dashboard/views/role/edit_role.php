<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card card-bd ">
            <div class="card-header">
                <div class="card-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <?php echo form_open("dashboard/role/save_update") ?>
            <div class="card-body">

                <div class="form-group row">
                    <label for="role_name" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i
                            class="text-danger">*</i></label>
                    <div class="col-sm-9">
                        <input name="role_name" type="text" class="form-control" id="role_name"
                            value="<?php echo $roleData->role_name?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role_description" class="col-sm-3 col-form-label"><?php echo display('description') ?>
                    </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" name="role_description"
                            id="role_description"><?php echo $roleData->role_description?></textarea>
                    </div>
                </div>
                <input type="hidden" name="role_id" value="<?php echo $roleData->role_id?>">
                <?php $m = 0; ?>
                <?php foreach ($modules as $value) { 
    
$menu_item = $this->db->select('*')->from('sec_menu_item')->where('module',$value->module)->get()->result();
    ?>
                <input type="hidden" name="module[]" value="<?php echo $value->module;?>">
                <table class="table table-bordered table-hover" id="RoleTbl">
                    <h2><?php echo display($value->module)?></h2>
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('menu_title') ?></th>
                            <th>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="allcheck" name="allcreate" value="1"
                                        id="allcreate_<?php echo $m?>" title="create" usemap="<?php echo $m?>">
                                    <label
                                        for="allcreate_<?php echo $m?>"><strong><?php echo display('can_create') ?></strong></label>
                                </div>
                            </th>
                            <th>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="allcheck" name="allread" value="1"
                                        id="allread_<?php echo $m?>" title="read" usemap="<?php echo $m?>">
                                    <label
                                        for="allread_<?php echo $m?>"><strong><?php echo display('can_read') ?></strong></label>
                                </div>
                            </th>
                            <th>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="allcheck" name="alledit" value="1"
                                        id="alledit_<?php echo $m?>" title="edit" usemap="<?php echo $m?>">
                                    <label
                                        for="alledit_<?php echo $m?>"><strong><?php echo display('can_edit') ?></strong></label>
                                </div>
                            </th>
                            <th>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="allcheck" name="alldelete" value="1"
                                        id="alldelete_<?php echo $m?>" title="del" usemap="<?php echo $m?>">
                                    <label
                                        for="alldelete_<?php echo $m?>"><strong><?php echo display('can_delete') ?></strong></label>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($menu_item)) ?>
                        <?php $sl = 0; ?>
                        <?php foreach ($menu_item as $value) { 
                                $ck_data = $this->db->select('*')
                                ->where('menu_id',$value->menu_id)
                                ->where('role_id',$roleData->role_id)->get('sec_role_permission')->row();
                            ?>
                        <tr>
                            <td><?php echo $sl+1; ?></td>
                            <td class="text-<?php echo ($value->parent_menu?'right':'')?>">
                                <?php echo display($value->menu_title); ?></td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="create_<?php echo $m?>"
                                        name="create[<?php echo $m?>][<?php echo $sl ?>][]" value="1"
                                        <?php echo ((@$ck_data->can_create==1)?"checked":null) ?>
                                        id="create[<?php echo $m?>]<?php echo $sl?>">
                                    <label for="create[<?php echo $m?>]<?php echo $sl ?>"></label>
                                </div>
                            </td>

                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="read_<?php echo $m?>"
                                        name="read[<?php echo $m?>][<?php echo $sl ?>][]" value="1"
                                        <?php echo ((@$ck_data->can_access==1)?"checked":null) ?>
                                        id="read[<?php echo $m?>]<?php echo $sl?>">
                                    <label for="read[<?php echo $m?>]<?php echo $sl ?>"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" class="edit_<?php echo $m?>"
                                        name="edit[<?php echo $m?>][<?php echo $sl ?>][]" value="1"
                                        <?php echo ((@$ck_data->can_edit==1)?"checked":null) ?>
                                        id="edit[<?php echo $m?>]<?php echo $sl?>">
                                    <label for="edit[<?php echo $m?>]<?php echo $sl ?>"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    <input type="checkbox" type="checkbox" class="del_<?php echo $m?>"
                                        name="delete[<?php echo $m?>][<?php echo $sl ?>][]" value="1"
                                        <?php echo ((@$ck_data->can_delete==1)?"checked":null) ?>
                                        id="delete[<?php echo $m?>]<?php echo $sl?>">
                                    <label for="delete[<?php echo $m?>]<?php echo $sl ?>"></label>
                                </div>
                            </td>

                            <input type="hidden" name="menu_id[<?php echo $m?>][<?php echo $sl ?>][]"
                                value="<?php echo $value->menu_id?>">

                        </tr>
                        <?php $sl++ ?>
                        <?php } ?>

                    </tbody>
                </table>
                <?php $m++ ?>
                <?php } ?>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>


            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>