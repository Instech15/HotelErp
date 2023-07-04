<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-header">
                <h4><?php echo display('purchase_return') ?></h4>
            </div>
            <div class="col-sm-12">
                <div class="card-body">
                    <?php echo form_open('purchase/purchase/purchase_return_entry',array('class' => 'form-verticle','id'=>'purchase_return' ))?>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group row">
                            <label for="supplier"
                                class="padding_right_5px col-form-label"><?php echo display('supplier_name') ?>:</label>
                            <div class="padding_right_5px">
                                <?php echo form_dropdown('supplier_id',$supplier,(!empty($supplier->supplier_id)?$supplier->supplier_id:null), 'class="form-control selectpicker w-138" data-live-search="true" id="supplier_id" onchange="getinvoice()" tabindex="1" required') ?>
                            </div>
                            <label for="supplier"
                                class="padding_right_5px col-form-label"><?php echo display('invoice') ?>:</label>
                            <div class="padding_right_5px w-138" id="invoicelist">
                                <select name="invoice" id="invoice" class="form-control">
                                    <option value="" selected="selected"><?php echo display('select_option') ?>
                                    </option>
                                </select>
                            </div>
                            <input name="invoiceurl" type="hidden"
                                value="<?php echo base_url("purchase/purchase/getinvoice") ?>" id="invoiceurl" />
                            <input name="serachurl" type="hidden"
                                value="<?php echo base_url("purchase/purchase/returnlist") ?>" id="serachurl" />
                            <button type="button" class="btn btn-success"
                                onclick="showinvoice()"><?php echo display('search') ?></button>
                        </div>
                    </div>
                    <div id="itemlist">


                    </div>
                    <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo MOD_URL.$module;?>/assets/js/purchaseReturn.js"></script>