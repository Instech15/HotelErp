<link rel="stylesheet" href="<?php echo MOD_URL.$module; ?>/assets/css/payform.css">
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">
                <?php echo form_open('customer/customer_info/paymentconfirm'); ?>
                <?php echo form_hidden('customerid', (!empty($intinfo->customerid)?$intinfo->customerid:null)) ?>
                <div class="form-group row">
                    <label for="paymenttype" class="col-sm-4 col-form-label"><?php echo display('payment_type'); ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control basic-single" required name="paymenttype" id="paymenttype">
                            <option value="" selected="selected"><?php echo display('please_select_one') ?></option>
                            <option value="refund"><?php echo "Refund" ?></option>
                            <option value="receieve"><?php echo "Receieve" ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="invoicediv" hidden>
                    <label for="invoice" class="col-sm-4 col-form-label"><?php echo display('booking_number') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('invoice',$invoicelist,'', 'class="selectpicker form-control" data-live-search="true" id="invoice"') ?>
                    </div>
                    <span id="msg" class="msg-center text-danger" hidden></span>
                </div>
                <div class="form-group row" id="paidamountdiv" hidden>
                    <label for="paid_amount" class="col-sm-4 col-form-label"><?php echo display('amount') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="paid_amount" min="1" autocomplete="off" class="form-control" type="text"
                            placeholder="<?php echo display('amount') ?>" id="paid_amount" value="">
                    </div>
                </div>
                <div class="form-group row" id="amountdiv" hidden>
                    <label for="amount" class="col-sm-4 col-form-label"><?php echo display('amount') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="amount" class="form-control" type="number" readonly
                            placeholder="<?php echo display('amount') ?>" id="amount" value="">
                    </div>
                </div>
                <div class="form-group row" id="chargediv" hidden>
                    <label for="charge" class="col-sm-4 col-form-label"><?php echo display("refund_charge"); ?></label>
                    <div class="col-sm-8">
                        <input name="charge" min="0" class="form-control" type="number"
                            placeholder="<?php echo display("refund_charge"); ?>" id="charge" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="remarks" class="col-sm-4 col-form-label"><?php echo display('remarks') ?>
                    </label>
                    <div class="col-sm-8">
                        <textarea name="remarks" autocomplete="off" class="form-control" type="text"
                            placeholder="<?php echo display('remarks') ?>" id="remarks" value=""> </textarea>
                    </div>
                </div>
                <span id="id" hidden><?php echo html_escape($intinfo->customerid); ?></span>
                <input type="hidden" id="days" name="days" value="">
                <input type="hidden" id="bookedid" name="bookedid" value="">
                <input type="hidden" id="bsource" name="bsource" value="">
                <input type="hidden" id="comission" name="comission" value="">
                <input type="hidden" id="bookingstatus" name="bookingstatus" value="">
                <input type="hidden" id="max_amount" name="max_amount" value="">
                <input type="hidden" id="hallroom" name="hallroom" value="">
                <div class="form-group text-right" id="confirmdiv">
                    <button type="submit" class="btn btn-success w-md m-b-5 mt-2"><?php echo display("confirm") ?></button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/payform.js"></script>