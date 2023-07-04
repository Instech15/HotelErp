 <div class="card">

     <div id="add0" class="modal fade" role="dialog">
         <div class="modal-dialog modal-md">
             <div class="modal-content">
                 <div class="modal-header">
                     <strong><?php echo display('add_category');?></strong>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <div class="col-sm-12 col-md-12">
                             <div class="card">

                                 <div class="card-body">

                                     <?php echo form_open('units/category/create') ?>
                                     <?php echo form_hidden('category_id', (!empty($intinfo->category_id)?$intinfo->category_id:null)) ?>
                                     <div class="form-group row">
                                         <label for="category_name"
                                             class="col-sm-4 col-form-label"><?php echo display('category_name') ?>
                                             <span class="text-danger">*</span></label>
                                         <div class="col-sm-8">
                                             <input name="category_name" class="form-control" type="text"
                                                 placeholder="<?php echo display('category_name') ?>" id="category_name"
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
                 <h4><?php echo display('categorylist') ?><small
                         class="float-right"><?php if($this->permission->method('units','create')->access()): ?>
                         <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                                 class="fa fa-plus-circle" aria-hidden="true"></i>
                             <?php echo display('add_new')?></button><?php endif; ?></small></h4>
             </div>


             <div class="card-body">
                 <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                     <thead>
                         <tr>
                             <th><?php echo display('sl_no') ?></th>
                             <th><?php echo display('category_name') ?></th>
                             <th><?php echo display('status') ?></th>
                             <th><?php echo display('action') ?></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($roomsizelist)) {
							 ?>
                         <?php $sl = 1;
                         $status = array(
                            '0'=>'Inactive',
                            '1'=>'Active'
                         );
                          ?>
                         <?php foreach ($roomsizelist as $type) { ?>
                         <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <td><?php echo html_escape($type->categoryname); ?></td>
                             <td><?php echo html_escape($status[$type->status]); ?></td>
                             <td class="center">
                                 <?php if($this->permission->method('units','update')->access()): ?>
                                 <input name="url" type="hidden" id="url_<?php echo html_escape($type->category_id); ?>"
                                     value="<?php echo base_url("units/category/updateintfrm") ?>" />
                                 <a onclick="editinfo('<?php echo html_escape($type->category_id); ?>')"
                                     class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                     title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                 <?php endif;?>
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