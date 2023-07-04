<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card card-bd lobidrag">
                <div class="card-header">
                    <div class="card-title">
                        <h4>
                            <?php if($this->permission->method('purchase','read')->access()): ?>
                            <a href="<?php echo base_url('purchase/invoice-return-list') ?>"
                                class="btn btn-sm btn-success" title="List"> <i class="ti-list"></i>
                                <?php echo display('list') ?></a>
                            <?php endif; ?>
                            <?php if($this->permission->method('purchase','create')->access()): ?>
                            <a href="<?php echo base_url('purchase/purchase-return') ?>"
                                class="btn btn-sm btn-info" title="Add"><i class="ti-plus"></i>
                                <?php echo display('ad') ?></a>&nbsp;<?php echo display("returned_list") ?>
                            <?php endif; ?>
                            <small class="float-right" id="print">
                                <input type="button" class="btn btn-info print-button text-white" name="btnPrint" id="btnPrint"
                                    value="Print" onclick="printContent('printArea')" />

                            </small>
                        </h4>
                    </div>
                </div>
                <div class="card-body" id="printArea">
                    <div class="text-center">
                        <h3> <?php echo html_escape($setting->storename);?> </h3>
                        <h4><?php echo display('supplier_name') ?>:<?php echo html_escape($purchaseinfo->supName);?>
                        </h4>
                        <h4><?php echo display('date') ?> : <?php echo html_escape($purchaseinfo->return_date);?></h4>
                        <h4><?php echo display('invoice_no') ?> : <?php echo html_escape($purchaseinfo->po_no);?></h4>
                        <h4> <?php echo display('print_date') ?>: <?php echo html_escape(date("d/m/Y h:i:s")); ?> </h4>
                    </div>
                    <?php if(!empty($iteminfo)){?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('ingredient_name') ?></th>
                                <th><?php echo display('return_qty') ?> </th>
                                <th><?php if($cIcon->position==1){echo "(".$cIcon->curr_icon.")";} echo display('price'); if($cIcon->position==2){echo "(".$cIcon->curr_icon.")";} ?> </th>
                                <th><?php if($cIcon->position==1){echo "(".$cIcon->curr_icon.")";} echo display('total'); if($cIcon->position==2){echo "(".$cIcon->curr_icon.")";} ?> </th>
                                <th><?php if($cIcon->position==1){echo "(".$cIcon->curr_icon.")";} echo display('total')." "; echo display('discount'); if($cIcon->position==2){echo "(".$cIcon->curr_icon.")";} ?> </th>
                                <th><?php if($cIcon->position==1){echo "(".$cIcon->curr_icon.")";} echo display('total')."(After dis.)"; if($cIcon->position==2){echo "(".$cIcon->curr_icon.")";} ?> </th>

                            </tr>
                        </thead>
                        <tbody id="addinvoiceItem">
                            <?php 
                                    $sl=1;
                                    foreach ($iteminfo as $details) {?>


                            <tr>
                                <td><?php echo html_escape($details->product_name); ?></td>
                                <td><?php echo html_escape($details->qty." ".$details->uom_short_code); ?></td>
                                <td> <?php echo html_escape($details->product_rate);?> </td>
                                <td><?php echo html_escape($details->qty*$details->product_rate);?> </td>
                                <td><?php echo html_escape($details->discount);?> </td>
                                <!-- Discount -->
                                <td><?php echo html_escape(($details->qty*$details->product_rate)-$details->discount); ?>
                                </td>

                            </tr>
                            <?php $sl++; } 
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"><label for="reason"
                                        class="col-form-label text_align"><strong><?php echo display('reason') ?></strong></label><br />
                                    <?php echo html_escape($purchaseinfo->return_reason);?> <br></td>
                                <td><b><?php echo display('grand_total') ?>:</b></td>
                                <td><?php echo html_escape($purchaseinfo->totalamount);?></td>

                            </tr>
                        </tfoot>
                    </table>
                    <?php } 
                            else{
                                echo "No Result Found!!!!!";
                                }
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>