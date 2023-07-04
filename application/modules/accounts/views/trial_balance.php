<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
            <h4><?php echo display('trial_balance')?></h4>
            </div>
            <div class="card-body">
            <?php echo form_open_multipart('accounts/accounts/trial_balance_report') ?>
                <div class="row" id="">
                    <div class="col-sm-6">
     
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpFromDate" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('from_date') ?>" class="datepickers form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text"  name="dtpToDate" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('to_date') ?>" class="datepickers form-control">
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label for="date" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="checkbox" id="chkWithOpening" name="chkWithOpening" size="40"/>&nbsp;&nbsp;&nbsp;<label for="chkWithOpening"><?php echo display('with_details') ?></label>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('find') ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>
