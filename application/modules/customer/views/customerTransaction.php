 <div class="card">
 <div class="card-header">
         <h4><?php echo display('customer_name').": ".(!empty($customer_infolist)?$customer_infolist[0]->firstname:"No Transaction Found"); ?></h4>
     </div>
     <div class="row">
         <!--  table area -->
         <div class="col-sm-12">

             <div class="card-body">
                 <div class="table-responsive">
                     <table width="100%" id="exdatatable"
                         class="datatable table table-striped table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th><?php echo display('sl_no') ?></th>
                                 <th><?php echo display('booking_number') ?></th>
                                 <th><?php echo display('remarks') ?></th>
                                 <th><?php echo display('debit') ?></th>
                                 <th><?php echo display('credit') ?></th>
                                 <th><?php echo display('balance') ?></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php if (!empty($customer_infolist)) {
                            ?>
                             <?php $sl = 1; $total = 0; ?>
                             <?php foreach ($customer_infolist as $customer) { ?>
                             <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                 <td><?php echo $sl; ?></td>
                                 <td><?php echo html_escape($customer->booking_number); ?></td>
                                 <td><?php echo html_escape($customer->Narration); ?></td>
                                 <td><?php echo html_escape($customer->Debit); $total+=$customer->Debit; ?></td>
                                 <td><?php echo html_escape($customer->Credit); $total-=$customer->Credit; ?></td>
                                 <td><?php echo html_escape($total); ?></td>

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