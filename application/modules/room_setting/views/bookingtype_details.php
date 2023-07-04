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

                                     <?php echo form_open('room_setting/booking_type/b_type_create'); ?>
                                     <?php echo form_hidden('btypeinfoid', (!empty($intinfo->booktypeid)?$intinfo->booktypeid:null)) ?>


                                     <div class="form-group row">
                                         <label for="booking_type"
                                             class="col-sm-4 col-form-label"><?php echo display('booking_type') ?> <span
                                                 class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <select class="form-control basic-single" required name="booking_type"
                                                 id="booking_type">
                                                 <option value="" selected="selected">
                                                     <?php echo display('please_select_one') ?></option>
                                                 <?php foreach ($booking_type_list as $ltype) {?>
                                                 <option value="<?php echo html_escape($ltype->booktypetitle)?>">
                                                     <?php echo html_escape($ltype->booktypetitle);?>
                                                 </option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="booking_sourse"
                                             class="col-sm-4 col-form-label"><?php echo display('booking_sourse') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="booking_sourse" autocomplete="off" class="form-control"
                                                 type="text" placeholder="<?php echo display('booking_sourse') ?>"
                                                 id="booking_sourse" value="" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="commissionrate"
                                             class="col-sm-4 col-form-label"><?php echo display('commission_rate') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="commissionrate" autocomplete="off" class="form-control"
                                                 type="text" placeholder="<?php echo display('commission_rate') ?>"
                                                 id="commissionrate" value="" required>
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
     <div id="pay" class="modal fade" role="dialog">
         <div class="modal-dialog modal-md">
             <div class="modal-content">
                 <div class="modal-header">
                     <strong><?php echo display("payment_form");?></strong>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body paymentinfo">

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
                 <h4><?php echo display('booking_source') ?><small
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
                             <th><?php echo display('booking_type') ?></th>
                             <th><?php echo display('booking_sourse') ?></th>
                             <th><?php echo display("commission_rate"); ?></th>
                             <th><?php echo display("total_balance"); ?></th>
                             <th><?php echo display("paid_amount"); ?></th>
                             <th><?php echo display("due_amount"); ?></th>
                             <th><?php echo display('action') ?></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($booking_type_details)) {
							 ?>
                         <?php $sl = 1; ?>
                         <?php foreach ($booking_type_details as $dtype) { ?>
                         <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <td><?php echo html_escape($dtype->booking_type); ?></td>
                             <td><?php echo html_escape($dtype->booking_sourse); ?></td>
                             <td><?php echo html_escape($dtype->commissionrate).'%'; ?></td>
                             <td><?php echo html_escape($dtype->balance); ?></td>
                             <td><?php echo html_escape($dtype->paid_amount); ?></td>
                             <td><?php echo html_escape($dtype->due_amount); ?></td>
                             <td class="center">
                                 <?php if($this->permission->method('room_setting','update')->access()): ?>
                                 <input name="url" type="hidden"
                                     id="url_<?php echo html_escape($dtype->btypeinfoid); ?>"
                                     value="<?php echo base_url("room_setting/booking_type/tydupdateintfrm") ?>" />
                                 <a onclick="editinfo('<?php echo html_escape($dtype->btypeinfoid); ?>')"
                                     class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                     title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                 <?php endif; 
                                  if($this->permission->method('room_setting','update')->access()): ?>
                                 <input name="url" type="hidden"
                                     id="pay_<?php echo html_escape($dtype->btypeinfoid); ?>"
                                     value="<?php echo base_url("room_setting/booking_type/payfrm") ?>" />
                                 <a onclick="paymentinfo('<?php echo html_escape($dtype->btypeinfoid); ?>')"
                                     class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left"
                                     title="Paynow"><i class="ti-money text-white" aria-hidden="true"></i></a>
                                 <?php endif; 
										 if($this->permission->method('room_setting','delete')->access()): ?>
                                 <a href="<?php echo base_url("room_setting/booking-typedtls-delete/".html_escape($dtype->btypeinfoid)) ?>"
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