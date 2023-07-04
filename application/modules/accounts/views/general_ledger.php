<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
            <h4><?php echo display('general_ledger')?></h4>
            </div>
            <div class="card-body">
            <?php echo form_open_multipart('accounts/accounts/accounts_report_search') ?>
                <div class="row" id="">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('gl_head')?></label>
                            <div class="col-sm-8">
                                <select class="form-control basic-single" name="cmbGLCode" id="cmbGLCode" required>
                                    <option value=""selected disabled>Select Item</option>
                                    <?php
                                    foreach($general_ledger as $g_data){
                                        ?>
                                        <option value="<?php echo html_escape($g_data->HeadCode);?>"><?php echo html_escape($g_data->HeadName);?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('transaction_head')?></label>
                            <div class="col-sm-8">
                                <select name="cmbCode" class="form-control basic-single" id="ShowmbGLCode">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpFromDate" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('date') ?>" class="datepickers form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text"  name="dtpToDate" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('date') ?>" class="datepickers form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="checkbox" id="chkIsTransction" name="chkIsTransction" size="40"/>&nbsp;&nbsp;&nbsp;<label for="chkIsTransction"><?php echo display('with_details')?></label>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5 glt"><?php echo display('find') ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>

