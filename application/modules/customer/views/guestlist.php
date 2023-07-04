 <div class="card">
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
                <h4><?php echo display('guest_list') ?><small class="float-right"></small></h4>
            </div>
             <div class="card-body">
                 <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                     <thead>
                         <tr>
                             <th><?php echo display('sl_no') ?></th>
                             <th><?php echo display('booking_number') ?></th>
                             <th><?php echo display('guest') ?></th>
                             <th><?php echo display('gender') ?></th>
                             <th><?php echo display('mobile') ?></th>
                             <th><?php echo display('email') ?></th>
                             <th><?php echo display("photo_id_type") ?></th>
                             <th><?php echo display("photo_id") ?></th>
                             <th><?php echo display('action') ?></th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php if (!empty($guestinfo)) {
							 ?>
                         <?php $sl = 1; ?>
                         <?php foreach ($guestinfo as $type) { 
                         ?>
                         <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                             <td><?php echo $sl; ?></td>
                             <td><?php echo html_escape($type->booking_number); ?></td>
                             <?php if(empty($type->customerid)){ ?>
                             <td><?php echo html_escape($type->guestname); ?></td>
                             <td><?php echo html_escape($type->gender); ?></td>
                             <td><?php echo html_escape($type->mobile); ?></td>
                             <td><?php echo html_escape($type->email); ?></td>
                             <td><?php echo html_escape($type->photo_id_type); ?></td>
                             <td><?php echo html_escape($type->photo_id); ?></td>
                             <?php } else{ ?>
                             <?php $guest = $this->db->select("*")->from("customerinfo")->where("customerid",$type->customerid)->get()->row(); ?>
                             <td><?php echo html_escape($guest->firstname); ?></td>
                             <td><?php echo html_escape($guest->gender); ?></td>
                             <td><?php echo html_escape($guest->cust_phone); ?></td>
                             <td><?php echo html_escape($guest->email); ?></td>
                             <td><?php echo html_escape($guest->pitype); ?></td>
                             <td><?php echo html_escape($guest->pid); ?></td>
                             <?php } ?>
                             <td class="center">
                                 <?php if($this->permission->method('customer','update')->access()): ?>
                                 <input name="url" type="hidden"
                                     id="url_<?php echo html_escape($type->otherguest_id); ?>"
                                     value="<?php echo base_url("customer/customer_info/guestupdate") ?>" />
                                 <a onclick="editinfo('<?php echo html_escape($type->otherguest_id); ?>')"
                                     class="btn btn-info btn-sm <?php if(!empty($type->customerid)){ echo "disabled"; }?>" data-toggle="tooltip" data-placement="left"
                                     title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                 <?php endif; 
										 if($this->permission->method('customer','delete')->access()): ?>
                                 <a href="<?php echo base_url("customer/customer_info/guestdelete/".html_escape($type->otherguest_id)) ?>"
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