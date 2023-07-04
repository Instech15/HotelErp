<div class="card">
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_new');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel">
                                
                                <div class="panel-body">
                                    <?php echo form_open('room_setting/starclass/create'); ?>
                                    <?php echo form_hidden('starcalssid', (!empty($intinfo->starcalssid)?$intinfo->starcalssid:null)) ?>
                                    <div class="form-group row">
                                        <label for="class_name" class="col-sm-4 col-form-label"><?php echo display('class_name') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="class_name" autocomplete="off" class="form-control" type="text" placeholder="<?php echo display('class_name') ?>" id="class_name" value="" required>
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
            <div class="card-header"><h4><?php echo display('starclass_list') ?><small class="float-right"><?php if($this->permission->method('room_setting','create')->access()): ?> <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="ti-plus" aria-hidden="true"></i>
            <?php echo display('add_new')?></button><?php endif; ?></small></h4></div>
            <div class="card-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('class_name') ?></th>
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($starclass)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($starclass as $type) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($type->starclassname); ?></td>
                            <td class="center">
                                <?php if($this->permission->method('room_setting','update')->access()): ?>
                                <input name="url" type="hidden" id="url_<?php echo html_escape($type->starcalssid); ?>" value="<?php echo base_url("room_setting/starclass/updateintfrm") ?>" />
                                <a onclick="editinfo('<?php echo html_escape($type->starcalssid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif;
                                if($this->permission->method('room_setting','delete')->access()): ?>
                                <a href="<?php echo base_url("room_setting/star-class-delete/".html_escape($type->starcalssid)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash"></i></a>
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