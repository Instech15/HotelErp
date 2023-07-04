<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">
                <?php echo form_open('room_setting/booking_type/commissionpayment'); ?>
                <?php echo form_hidden('btypeinfoid', (!empty($btyinfo->btypeinfoid)?$btyinfo->btypeinfoid:null)) ?>
                <div class="form-group row">
                    <label for="paid_amount" class="col-sm-4 col-form-label"><?php echo display('amount') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="paid_amount" autocomplete="off" class="form-control" type="text"
                            value=""
                            placeholder="<?php echo display('amount') ?>" id="paid_amount" value="" required>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display("payn") ?></button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>