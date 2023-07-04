<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">
                <?php echo form_open('units/supplierlist/updatepayment') ?>
                <?php echo form_hidden('supid', (!empty($intinfo->supid)?$intinfo->supid:null)) ?>
                <input name="oldname" type="hidden"
                    value="<?php echo html_escape($intinfo->suplier_code.'-'.$intinfo->supName);?>" />
                <input name="supcode" type="hidden" value="<?php echo html_escape($intinfo->suplier_code);?>" />
                <div class="form-group row">
                    <label for="suppliername" class="col-sm-4 col-form-label"><?php echo display('supplier_name') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="suppliername" class="form-control" type="text"
                            placeholder=" <?php echo display('supplier_name') ?>" id="suppliername"
                            value="<?php echo html_escape((!empty($intinfo->supName)?$intinfo->supName:null)) ?>"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="invoice" class="col-sm-4 col-form-label"><?php echo display('invoice') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('invoice',$invoicelist,'', 'class="selectpicker form-control" data-live-search="true" id="invoice"') ?>
                    </div>
                </div>
                <div class="form-group row" id="amountdiv" hidden>
                    <label for="amount" class="col-sm-4 col-form-label"><?php echo display('amount') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="amount" class="form-control" type="number" readonly
                            placeholder="<?php echo display('amount') ?>" id="amount" value="" required>
                    </div>
                </div>
                <span id="msg" class="text-danger d-flex justify-content-center" hidden></span>
                <span id="id" hidden><?php echo html_escape($intinfo->supid); ?></span>
                <div class="form-group text-right" id="update" hidden>
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('payn') ?></button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL . $module; ?>/assets/js/supplierpay.js"></script>