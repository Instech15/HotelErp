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

                                     <?php echo form_open('room_setting/booking_type/complementary_create'); ?>
                                     <div class="form-group row">
                                         <label for="roomtype"
                                             class="col-sm-4 col-form-label"><?php echo display('roomtype') ?> <span
                                                 class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <select class="form-control basic-single" required name="roomtype"
                                                 id="roomtype">
                                                 <option value="" selected="selected">
                                                     <?php echo display('please_select_one') ?></option>
                                                 <?php foreach ($roomtype as $ltype) {?>
                                                 <option value="<?php echo html_escape($ltype->roomtype) ?>">
                                                     <?php echo html_escape($ltype->roomtype);?>
                                                 </option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="complementaryname"
                                             class="col-sm-4 col-form-label"><?php echo display('complementary') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="complementaryname" autocomplete="off" class="form-control"
                                                 type="text" placeholder="<?php echo display('complementary') ?>"
                                                 id="complementaryname" value="" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="rate"
                                             class="col-sm-4 col-form-label"><?php echo display('s_rate') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="rate" autocomplete="off" class="form-control"
                                                 type="number" placeholder="<?php echo display('s_rate') ?>"
                                                 id="rate" value="">
                                         </div>
                                     </div>
                                     <div class="form-group text-right">
                                         <button type="reset"
                                             class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                         <button type="submit"
                                             class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
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
             <div class="card-header">
                 <h4><?php echo display('complementary') ?><small
                         class="float-right"><?php if($this->permission->method('room_setting','create')->access()): ?><button
                             type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                                 class="fa fa-plus-circle" aria-hidden="true"></i>
                             <?php echo display('add_new')?></button><?php endif; ?></small></h4>
             </div>
             <div class="card-body">
                 <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                     <thead>
                         <tr>
                             <th><?php echo display('sl_no') ?></th>
                             <th><?php echo display('roomtype') ?></th>
                             <th><?php echo display('complementary') ?></th>
                             <th><?php echo display('s_rate') ?></th>
                             <th><?php echo display('action') ?></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($complist)) {
							 ?>
                         <?php $sl = 1; ?>
                         <?php foreach ($complist as $dtype) { ?>
                         <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <td><?php echo html_escape($dtype->roomtype); ?></td>
                             <td><?php echo html_escape($dtype->complementaryname); ?></td>
                             <td><?php echo html_escape($dtype->rate); ?></td>
                             <td class="center">
                                 <?php if($this->permission->method('room_setting','update')->access()): ?>
                                 <input name="url" type="hidden"
                                     id="url_<?php echo html_escape($dtype->complementary_id); ?>"
                                     value="<?php echo base_url("room_setting/booking_type/comupdateintfrm") ?>" />
                                 <a onclick="editinfo('<?php echo html_escape($dtype->complementary_id); ?>')"
                                     class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                     title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                 <?php endif; 
										 if($this->permission->method('room_setting','delete')->access()): ?>
                                 <a href="<?php echo base_url("room_setting/booking_type/comdelete/".html_escape($dtype->complementary_id)) ?>"
                                     onclick="return confirm('<?php echo display("are_you_sure") ?>')"
                                     class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right"
                                     title="Delete "><i class="ti-trash"></i></a>
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