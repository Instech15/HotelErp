<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo display('purchase_edit') ?></h4>
            </div>
            <?php if($iteminfo->status!=1){ ?>
            <div class="card-body">
                <?php echo form_open_multipart('purchase/purchase/update_entry',array('class' => 'form-vertical', 'id' => 'insert_purchase','name' => 'insert_purchase'))?>
                <?php echo form_hidden('purID', (!empty($purchaseinfo->purID)?$purchaseinfo->purID:null));
					 echo form_hidden('oldinvoice', (!empty($purchaseinfo->invoiceid)?$purchaseinfo->invoiceid:null));
					 echo form_hidden('oldsupplier', (!empty($purchaseinfo->suplierID)?$purchaseinfo->suplierID:null));
					 $originalDate = $purchaseinfo->purchasedate;
					 $purchasedate = date("d-m-Y", strtotime($originalDate));
					 
					 $originalexDate = $purchaseinfo->purchaseexpiredate;
					 $expiredatedate = date("d-m-Y", strtotime($originalexDate));
					 ?>
                <input name="url" type="hidden" id="url"
                    value="<?php echo base_url("purchase/purchase/purchaseitem") ?>" />

                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label for="supplier_sss"
                                class="col-sm-3 col-form-label"><?php echo display('supplier_name') ?> <i
                                    class="text-danger">*</i>
                            </label>
                            <div class="col-sm-5">
                                <?php 
						if(empty($supplier)){$supplier = array('' => '--Select--');}
						echo form_dropdown('suplierid',$supplier,(!empty($purchaseinfo->suplierID)?$purchaseinfo->suplierID:null),'class="form-control"  id="suplierid"') ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <a
                                    href="<?php echo base_url("setting/supplierlist/index") ?>"><?php echo display('add_supplier') ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group row">
                            <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('invoice_no') ?>
                                <i class="text-danger">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" tabindex="3" class="form-control" name="invoice_no"
                                    value="<?php echo html_escape($purchaseinfo->invoiceid);?>" readonly placeholder="Invoice No"
                                    id="invoice_no" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('purchase_date') ?><i
                                    class="text-danger">*</i>
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepickers" name="purchase_date"
                                    value="<?php echo html_escape($purchasedate);?>" required="" tabindex="2">
                            </div>
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('expiry_date') ?> <i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepickers" name="expire_date"
                                    value="<?php echo html_escape($expiredatedate);?>"
                                    id="expire_date" required="" tabindex="2" readonly="readonly">
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-5">
                        <div class="form-group row">
                            <label for="adress" class="col-sm-4 col-form-label"><?php echo display('details') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" tabindex="4" id="adress" name="purchase_details"
                                    placeholder=" Details"
                                    rows="1"><?php echo html_escape($purchaseinfo->details);?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover" id="purchaseTable">
                    <thead>
                        <tr>
                            <th class="text-center" width="20%"><?php echo display('item_information') ?><i
                                    class="text-danger">*</i></th>
                            <th class="text-center"><?php echo display('stockqnt') ?></th>
                            <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                            <th class="text-center"><?php echo display('defaultrate') ?><i class="text-danger">*</i>
                            </th>
                            <th class="text-center"><?php echo display('total') ?></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody id="addPurchaseItem">
                        <?php $i=0;
                                if($iteminfo->details){
								foreach($iteminfo->details as $item){
									$i++;
									?>
                        <tr>
                            <td class="span3 supplier">
                                <input type="text" name="product_name" required="" class="form-control product_name"
                                    onkeypress="product_list(<?php echo $i;?>);" placeholder="Item Name"
                                    id="product_name_<?php echo $i;?>"
                                    value="<?php echo html_escape($item->product_name);?>" tabindex="5">
                                <input type="hidden" class="autocomplete_hidden_value product_id_<?php echo $i;?>"
                                    name="product_id[]" id="SchoolHiddenId"
                                    value="<?php echo html_escape($item->id);?>">
                                <input type="hidden" class="sl" value="<?php echo $i;?>">
                            </td>

                            <td class="wt">
                                <input type="text" id="available_quantity_<?php echo $i;?>"
                                    class="form-control text-right stock_ctn_<?php echo $i;?>" placeholder="0.00"
                                    value="" readonly="">
                            </td>

                            <td class="text-right">
                                <input type="number" min="1" name="product_quantity[]" id="cartoon_<?php echo $i;?>"
                                    class="form-control text-right store_cal_1"
                                    onkeyup="calculate_store(<?php echo $i;?>);"
                                    onchange="calculate_store(<?php echo $i;?>);" placeholder="0.00"
                                    value="<?php echo html_escape($item->quantity);?>" min="0" tabindex="6" required>
                            </td>
                            <td class="test">
                                <input type="text" name="product_rate[]" onkeyup="calculate_store(<?php echo $i;?>);"
                                    onchange="calculate_store(<?php echo $i;?>);" id="product_rate_<?php echo $i;?>"
                                    class="form-control product_rate_<?php echo $i;?> text-right" placeholder="0.00"
                                    value="<?php echo html_escape($item->price);?>" min="0" tabindex="7">
                            </td>


                            <td class="text-right">
                                <input class="form-control total_price text-right" type="text" name="total_price[]"
                                    id="total_price_<?php echo $i;?>"
                                    value="<?php echo html_escape($item->totalprice);?>" readonly="readonly">
                            </td>
                            <td>
                                <button class="btn btn-danger red text_align_right" type="button" value="Delete"
                                    onclick="deletePurchaseRow(this)"
                                    tabindex="8"><?php echo display('delete')?></button>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <input type="button" id="add_invoice_item" class="btn btn-success"
                                    name="add-invoice-item" onclick="addmore('addPurchaseItem');" value="Add More item"
                                    tabindex="9">
                            </td>
                            <td class="text_align_right" colspan="2"><b><?php echo display('grand_total') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="grandTotal" class="text-right form-control"
                                    name="grand_total_price"
                                    value="<?php echo html_escape($purchaseinfo->total_price);?>" readonly="readonly">
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="submit" id="add_purchase" class="btn btn-success btn-large" name="add-purchase"
                            value="Submit">
                    </div>
                </div>
                </form>
            </div>
            <?php }else{ ?>
                <div class="card-body">
                    <h4 class="text-center text-danger">You can not edit any purchase after payment.</h4>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/purchaseEdit.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/addPurchase.js"></script>