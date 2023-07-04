<div class="card">
    <?php if($this->permission->method('room_setting','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('floor_list')?> <small class="float-right"><a href="<?php echo base_url("room_setting/floor-plan-list") ?>" class="btn btn-primary btn-md"><i class="ti-plus" aria-hidden="true"></i><?php echo display('add_floor')?></a></small></h4>
    </div>
    <?php endif; ?>
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('update');?></strong>
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
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($floorlist)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($floorlist as $type) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($type->floorname); ?></td>
                            <td class="center">
                                <?php if($this->permission->method('room_setting','update')->access()): ?>
                                <input name="url" type="hidden" id="url_<?php echo html_escape($type->floorid); ?>" value="<?php echo base_url("room_setting/floorplan/updatefloor") ?>" />
                                <a onclick="editinfo('<?php echo html_escape($type->floorid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif;
                                if($this->permission->method('room_setting','delete')->access()): ?>
                                <a href="<?php echo base_url("room_setting/delete-floor/".html_escape($type->floorid)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash"></i></a>
                                <?php endif; ?>
                            </td>
                            
                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                    </table>  <!-- /.table-responsive -->
                    <?php echo htmlspecialchars_decode($links); ?>
                </div>
                </div>
            </div>
        </div>
    </div>