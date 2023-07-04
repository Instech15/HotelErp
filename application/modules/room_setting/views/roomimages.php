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
                            <div class="card">
                                
                                <div class="card-body">
                                    <?php echo form_open_multipart('room_setting/room_images/create') ?>
                                    <?php echo form_hidden('room_img_id', (!empty($intinfo->room_img_id)?$intinfo->room_img_id:null)) ?>
                                    <div class="form-group row">
                                        <label for="room_name" class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('room_name',$allrooms,'', 'class="selectpicker form-control" data-live-search="true" id="room_name" required') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-4 col-form-label"><?php echo display('image') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="file" accept="image/*" name="picture" onchange="loadFile(event)" required><a class="cattooltipsimg" data-toggle="tooltip" data-placement="top" title="Use only .jpg,.jpeg,.gif and .png Images"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                            <small id="fileHelp" class="text-muted"><img src="<?php echo html_escape(base_url(!empty($intinfo->room_imagename)?$intinfo->room_imagename:'assets/img/room-setting/room_images.png')); ?>" id="output" class="img-thumbnail height_150_width_200px jsclrimg" required/>
                                            </small>
                                            <input type="hidden" name="old_image" value="<?php echo html_escape((!empty($intinfo->room_imagename)?$intinfo->room_imagename:null)) ?>">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5" onclick="clrimage()"><?php echo display('reset') ?></button>
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
            <div class="card-header"><h4><?php echo display('room_image') ?><small class="float-right"><?php if($this->permission->method('room_setting','create')->access()): ?><button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
            <?php echo display('add_new')?></button><?php endif; ?></small></h4></div>
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('room_name') ?></th>
                            <th><?php echo display('image') ?></th>
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($roomimage)) {
                        ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($roomimage as $type) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($type->roomtype); ?></td>
                            <td><img src="<?php echo html_escape(base_url(!empty($type->room_imagename)?$type->room_imagename:'assets/img/room-setting/room_images.png')); ?>" alt="Image" width="80"></td>
                            <td class="center">
                                <?php if($this->permission->method('room_setting','update')->access()): ?>
                                <input name="url" type="hidden" id="url_<?php echo html_escape($type->room_img_id); ?>" value="<?php echo base_url("room_setting/room_images/updateintfrm") ?>" />
                                <a onclick="editinforoom('<?php echo html_escape($type->room_img_id); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                <?php endif;
                                if($this->permission->method('room_setting','delete')->access()): ?>
                                <a href="<?php echo base_url("room_setting/images-delete/".html_escape($type->room_img_id)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash"></i></a>
                                <?php endif; ?>
                            </td>
                            
                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                    </table>  <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/roomImage.js"></script>