 <div class="card">

     <div id="add0" class="modal fade" role="dialog">
         <div class="modal-dialog modal-md">
             <div class="modal-content">
                 <div class="modal-header">
                     <strong><?php echo display('addnew_promocode');?></strong>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <div class="col-sm-12 col-md-12">
                             <div class="card">

                                 <div class="card-body">

                                     <?php echo form_open('room_setting/promo_code/create') ?>
                                     <?php echo form_hidden('promocodeid', (!empty($intinfo->promocodeid)?$intinfo->promocodeid:null)) ?>
                                     <div class="form-group row">
                                         <label for="room_name"
                                             class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span
                                                 class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <?php echo form_dropdown('roomid',$roomlist,'', 'class="selectpicker form-control" data-live-search="true" required id="room_name"') ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="start_date"
                                             class="col-sm-4 col-form-label"><?php echo display('start_date') ?> <span
                                                 class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="startdate" autocomplete="off"
                                                 class="datepickers form-control" type="text"
                                                 placeholder="<?php echo display('start_date') ?>" id="start_date" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="end_date"
                                             class="col-sm-4 col-form-label"><?php echo display('end_date') ?> <span
                                                 class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="enddate" autocomplete="off" class="datepickers form-control"
                                                 type="text" placeholder="<?php echo display('end_date') ?>"
                                                 id="end_date" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="promocode"
                                             class="col-sm-4 col-form-label"><?php echo display('promocode') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="promocode" class="form-control" type="text"
                                                 placeholder="<?php echo display('promocode') ?>" id="facilityname"
                                                 value="" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="discount"
                                             class="col-sm-4 col-form-label"><?php echo display('discount') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="discount" class="form-control" type="text"
                                                 placeholder="<?php echo display('discount') ?>" id="facilityname"
                                                 value="" required>
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
                 <h4><?php echo display('promocode_list') ?><small
                         class="float-right"><?php if($this->permission->method('room_setting','create')->access()): ?>
                         <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                                 class="fa fa-plus-circle" aria-hidden="true"></i>
                             <?php echo display('addnew_promocode')?></button><?php endif; ?></small></h4>
             </div>


             <div class="card-body">
                 <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                     <thead>
                         <tr>
                             <th><?php echo display('sl_no') ?></th>
                             <th><?php echo display('roomtype') ?></th>
                             <th><?php echo display('start_date') ?></th>
                             <th><?php echo display('end_date') ?></th>
                             <th><?php echo display('discount') ?></th>
                             <th><?php echo display('promocode') ?></th>
                             <th><?php echo display('status') ?></th>
                             <th><?php echo display('action') ?></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($roomsizelist)) {
							 ?>
                         <?php $sl = 1; ?>
                         <?php foreach ($roomsizelist as $type) { ?>
                         <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <?php $room_name = $this->db->select("roomtype")->from("roomdetails")->where("roomid",$type->roomid)->get()->row() ?>
                             <td><?php echo html_escape($room_name->roomtype); ?></td>
                             <td><?php echo html_escape($type->startdate); ?></td>
                             <td><?php echo html_escape($type->enddate); ?></td>
                             <td><?php echo html_escape($type->discount); ?></td>
                             <td><?php echo html_escape($type->promocode); ?></td>
                             <td><?php if($type->status==1){echo display("used");}if($type->status==0){if(date("Y-m-d")>=$type->enddate){echo display("expired");}else{echo display("available");}}?>
                             </td>
                             <td class="center">
                                 <?php if($this->permission->method('room_setting','update')->access()): ?>
                                 <input name="url" type="hidden" id="url_<?php echo html_escape($type->promocodeid); ?>"
                                     value="<?php echo base_url("room_setting/promo_code/updateintfrm") ?>" />
                                 <a onclick="peditinfo('<?php echo html_escape($type->promocodeid); ?>')"
                                     class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                     title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                 <?php endif; 
										 if($this->permission->method('room_setting','delete')->access()): ?>
                                 <a href="<?php echo base_url("room_setting/promo_code/delete/".html_escape($type->promocodeid)) ?>"
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