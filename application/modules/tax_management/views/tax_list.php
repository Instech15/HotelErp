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

                                     <?php echo form_open('tax_management/tax/create'); ?>
                                     <?php echo form_hidden('tax_id', (!empty($intinfo->tax_id)?$intinfo->tax_id:null)) ?>

                                     <div class="form-group row">
                                         <label for="tax" class="col-sm-4 col-form-label"><?php echo display("tax_name") ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="tax" autocomplete="off" class="form-control" type="text"
                                                 placeholder="<?php echo display("tax_name") ?>" id="tax" value="" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="rate" class="col-sm-4 col-form-label"><?php echo display('s_rate') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="rate" autocomplete="off" class="form-control" type="text"
                                                 placeholder="<?php echo display('s_rate') ?>" id="rate" value="" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="reg_no" class="col-sm-4 col-form-label"><?php echo display('reg_no') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="reg_no" autocomplete="off" class="form-control" type="text"
                                                 placeholder="<?php echo display('reg_no') ?>" id="reg_no" value="" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="isactive" class="col-sm-4 col-form-label"><?php echo display('is_active') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-5">
                                             <input name="isactive" autocomplete="off" class="check-align"
                                                 type="checkbox" id="isactive" checked value="1">
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
                 <h4><?php echo display('tax_list') ?><small
                         class="float-right"><?php if($this->permission->method('tax_management','create')->access()): ?><button
                             type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                                 class="fa fa-plus-circle" aria-hidden="true"></i>
                             <?php echo display('add_new')?></button><?php endif; ?></small></h4>
             </div>
             <div class="card-body">
                 <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                     <thead>
                         <tr>
                             <th><?php echo display('sl_no') ?></th>
                             <th><?php echo display("tax_name") ?></th>
                             <th><?php echo display("rate"); ?></th>
                             <th><?php echo display("reg_no"); ?></th>
                             <th><?php echo display("is_active"); ?></th>
                             <th><?php echo display('action') ?></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($tax_details)) {
							 ?>
                         <?php $sl = 1; ?>
                         <?php foreach ($tax_details as $dtype) { ?>
                         <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <td><?php echo html_escape($dtype->taxname); ?></td>
                             <td><?php echo html_escape($dtype->rate).'%'; ?></td>
                             <td><?php echo html_escape($dtype->reg_no); ?></td>
                             <td><?php if($dtype->isactive==1) { echo display("active");} else {echo display("inactive");} ?></td>
                             <td class="center">
                                 <?php if($this->permission->method('tax_management','update')->access()): ?>
                                 <input name="url" type="hidden"
                                     id="url_<?php echo html_escape($dtype->tax_id); ?>"
                                     value="<?php echo base_url("tax_management/tax/updateintfrm") ?>" />
                                 <a onclick="editinfo('<?php echo html_escape($dtype->tax_id); ?>')"
                                     class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                     title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                 <?php endif; 
										 if($this->permission->method('tax_management','delete')->access()): ?>
                                 <a href="<?php echo base_url("tax_management/tax/delete/".html_escape($dtype->tax_id)) ?>"
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