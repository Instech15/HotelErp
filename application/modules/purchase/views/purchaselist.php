<div class="card">
 <?php if($this->permission->method('purchase','create')->access()): ?>
<div class="card-header"><h4><?php echo display('purchase_list')?><small class="float-right"><a href="<?php echo base_url("purchase/purchase-create")?>" class="btn btn-primary btn-md"><i class="ti-plus" aria-hidden="true"></i>
<?php echo display('purchase_add')?></a> </small></h4></div>
<?php endif; ?>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('invoice_no') ?></th>
                            <th><?php echo display('supplier_name') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('price') ?></th>
                            <th><?php echo display('payment_status') ?></th>
                            <th><?php echo display('action') ?></th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($purchaselist)) { ?>
                            <?php $sl = $pagenum+1; ?>
                            <?php foreach ($purchaselist as $items) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><a href="<?php echo base_url("reports/invoice-information/".html_escape($items->purID)) ?>"><?php echo html_escape($items->invoiceid); ?></a></td>
                                    <td><?php echo html_escape($items->supName); ?></td>
                                    <td><?php $originalDate = $items->purchasedate;
									echo $newDate = date("d-M-Y", strtotime($originalDate));
									 ?></td>
                                     <td><?php if($currency->position==1){echo html_escape($currency->curr_icon);}?> <?php echo html_escape($items->total_price); ?> <?php if($currency->position==2){echo html_escape($currency->curr_icon);}?></td>
                                     <td><?php if($items->status==1){echo display("paid");}else{echo display("unpaid");} ?></td>
                                   <td class="center">
                                    <?php if($this->permission->method('purchase','update')->access()): ?>
                                    <?php if($items->status!=1){ ?>
                                    <input name="url" type="hidden" id="url_<?php echo html_escape($items->purID); ?>" value="<?php echo base_url("purchase-update") ?>" />
                                        <a href="<?php echo base_url("purchase/purchase-update/".html_escape($items->purID)) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a> 
                                        <?php } ?>
                                         <?php endif; 
										 //if($this->permission->method('purchase','delete')->access()): ?>
                                        <!-- <a href="<?php echo base_url("purchase/purchase-delete/".html_escape($items->purID)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash" aria-hidden="true"></i></a>  -->
                                         <?php //endif; ?>
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
</div>

     
