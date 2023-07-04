<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">

            <div class="card-body">

                <?php echo form_open('payment_setting/paymentmethod/currency_create') ?>
                <?php echo form_hidden('currency_id', (!empty($intinfo->id)?$intinfo->id:null)) ?>
                <div class="form-group row">
                    <label for="currency_name" class="col-sm-4 col-form-label"><?php echo display('currency_name') ?></label>
                    <div class="col-sm-8">
                        <input name="currency_name" class="form-control" type="text"
                            placeholder="<?php echo display('currency_name') ?>" id="currency"
                            value="<?php echo html_escape((!empty($intinfo->currency_name)?$intinfo->currency_name:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="currency_details" class="col-sm-4 col-form-label"><?php echo display('details') ?></label>
                    <div class="col-sm-8">
                        <input name="currency_details" class="form-control" type="text"
                            placeholder="<?php echo display('details') ?>" id="currency_details"
                            value="<?php echo html_escape((!empty($intinfo->currency_details)?$intinfo->currency_details:null)) ?>">
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>