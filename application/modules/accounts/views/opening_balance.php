<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo display('opening_balance') ?></h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('accounts/accounts/opening_balance') ?>
                <div class="row" id="">
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="acc_head"
                                class="col-sm-4 col-form-label"><?php echo display('head_of_account') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <select class="form-control basic-single" name="acc_head" id="acc_head" required>
                                    <option value=""><?php echo display('select_type') ?></option>
                                    <?php
                                    foreach($acc as $g_data){ ?>
                                    <option value="<?php echo html_escape($g_data->HeadCode);?>">
                                        <?php echo html_escape($g_data->HeadName);?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('amount') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="text" name="amount" id="amount" value=""
                                    placeholder="<?php echo display('amount') ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remark" class="col-sm-4 col-form-label"><?php echo display('remark')?></label>
                            <div class="col-sm-8">
                                <textarea name="remark" id="remark" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="submit"
                                class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                            <span id="finsubmit" class="btn btn-success w-md m-b-5"
                                hidden><?php echo display('update') ?></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>