<div class="card">
    <?php if ($this->permission->method('room_setting', 'create')->access()) : ?>
        <div class="card-header">
            <h4><?php echo display('floorplan_list') ?> <small class="float-right"> <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                        <?php echo display('assign_floor') ?></button>&nbsp;<button type="button" class="btn btn-primary btn-md mb-2" data-target="#add2" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                        <?php echo display('add_floor') ?></button>&nbsp;<a href="<?php echo base_url("room_setting/floor-list") ?>" class="btn btn-primary btn-md mb-2"><?php echo display('floor_list') ?></a></small></h4>
        </div>
    <?php endif; ?>
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_new'); ?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel">

                                <div class="panel-body">
                                    <?php echo form_open('room_setting/floor-plan-create'); ?>
                                    <?php echo form_hidden('floorplanid', (!empty($intinfo->floorplanid) ? $intinfo->floorplanid : null)) ?>
                                    <div class="form-group row">
                                        <label for="floor_name" class="col-sm-4 col-form-label"><?php echo display('floor_name') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8 customesl pl-0">
                                            <?php echo form_dropdown('floor_name', $allfloor, '', 'class="selectpicker form-control" data-live-search="true" id="floor_name" required') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="num_of_room" class="col-sm-4 col-form-label"><?php echo display('start_roomno') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8 pl-0">
                                            <input name="startno" autocomplete="off" class="form-control" min="1" type="number" placeholder="<?php echo display('start_roomno') ?>" id="startno" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="num_of_room" class="col-sm-4 col-form-label"><?php echo display('num_of_room') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8 pl-0">
                                            <input name="num_of_room" autocomplete="off" class="form-control" min="1" type="number" placeholder="<?php echo display('num_of_room') ?>" id="num_of_room" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row" id="roomno">

                                    </div>
                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    <div id="add2" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_floor'); ?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel">

                                <div class="panel-body">
                                    <?php echo form_open('room_setting/floorplan/addfloor'); ?>
                                    <?php echo form_hidden('floorid', (!empty($intinfo->floorid) ? $intinfo->floorid : null)) ?>
                                    <div class="form-group row">
                                        <label for="floor_name" class="col-sm-4 col-form-label"><?php echo display('floor_name') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="floor_name" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('floor_name') ?>" id="floor_name" required>
                                        </div>

                                    </div>
                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('update'); ?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editinfo">

                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('floor_name'); ?></th>
                                <th><?php echo display('num_of_room'); ?></th>
                                <th><?php echo display('start_roomno'); ?></th>
                                <th><?php echo display('action') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($floorplan)) {
                            ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($floorplan as $type) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($type->florname); ?></td>
                                        <td><?php echo html_escape($type->noofroom); ?></td>
                                        <td><?php echo html_escape($type->startno); ?></td>
                                        <td class="center">
                                            <?php if ($this->permission->method('room_setting', 'update')->access()) : ?>
                                                <input name="url" type="hidden" id="url_<?php echo html_escape($type->floorName); ?>" value="<?php echo base_url("room_setting/floorplan/updateintfrm") ?>" />
                                                <a onclick="editinforoom('<?php echo html_escape($type->floorName); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                            <?php endif;
                                            if ($this->permission->method('room_setting', 'delete')->access()) : ?>
                                                <a href="<?php echo base_url("room_setting/floor-plan-delete/" . html_escape($type->floorName)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash"></i></a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    <?php $sl++; ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table> <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL . $module; ?>/assets/js/floorPlanList.js"></script>