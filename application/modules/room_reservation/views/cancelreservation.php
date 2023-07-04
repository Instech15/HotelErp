<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">

            <div class="card-body">
                <?php echo form_open('room_reservation/room_reservation/cancelbooking');?>
                <?php echo form_hidden('bookedid', (!empty($bookedid)?$bookedid:null)) ?>
                <div class="form-group row">
                    <label for="cancelreason" class="col-sm-4 col-form-label"><?php echo display("cancel")." ".display("reason"); ?> <span
                            class="text-danger">*</span></label>
                    <input class="col-sm-8" required name="cancelreason" type="text" placeholder="<?php echo display("cancel")." ".display("reason"); ?>"
                        value="">
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label"><?php echo display('payment_method') ?> </label>
                    <select class="col-sm-8 form-select selectpicker" name="pmethod" id="paymentmode"
                        data-live-search="true">
                        <option value="" selected><?php echo display('payment_method') ?></option>
                        <?php foreach($paymentdetails as $ptype){ ?>
                        <option value="<?php echo html_escape($ptype->payment_method) ?>">
                            <?php echo html_escape($ptype->payment_method) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="modedetails" hidden>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label" id="cardlabel"><?php echo display("card_number"); ?>
                        </label>
                        <input type="text" name="cardNumber" class="col-sm-8" id="cardno" placeholder="<?php echo display("card_number"); ?>">
                    </div>
                    <div class="form-group row">
                        <label for="status" id="banklabel" class="col-sm-4 col-form-label"><?php echo display('date') ?>
                        </label>
                        <input type="text" class="col-sm-8" id="recdate" placeholder="Date">
                        <select class="selectpicker form-select col-sm-8" name="bankName" data-live-search="true" data-width="100%"
                            id="bankname">
                            <option value="" selected>Choose <?php echo display('bank_name') ?></option>
                            <?php foreach($banklist as $list){ ?>
                            <option value="<?php echo html_escape($list->HeadName); ?>">
                                <?php echo html_escape($list->HeadName);?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cancelationcharge"
                        class="col-sm-4 col-form-label"><?php echo display("cancel_charge"); ?></label>
                    <input class="col-sm-8" name="cancelationcharge" type="number" placeholder="<?php echo display("cancel_charge"); ?>" value="">
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/reservationEdit.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/cancelreservation.js"></script>
