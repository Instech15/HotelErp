<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo "Update ".display('journal_voucher')?>
                </h4>
            </div>
            <div class="card-body">

                <?php echo form_open_multipart('accounts/accounts/update_journal_voucher') ?>
                <div class="form-group row">
                    <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>
                    <div class="col-sm-4">
                        <input type="text" name="txtVNo" id="txtVNo"
                            value="<?php echo html_escape($journal_info[0]->VNo); ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label"> <?php echo display('date')?></label>
                    <div class="col-sm-4">
                        <input type="text" name="dtpDate" id="dtpDate" class="form-control datepickers"
                            value="<?php echo html_escape($journal_info[0]->VDate);?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtRemarks" class="col-sm-2 col-form-label"> <?php echo display('remark')?></label>
                    <div class="col-sm-4">
                        <textarea name="txtRemarks" id="txtRemarks"
                            class="form-control"><?php echo html_escape($journal_info[0]->Narration)?></textarea>
                    </div>
                </div>
                <div class="table-responsive mt_10px">
                    <table class="table table-bordered table-hover" id="debtAccVoucher">
                        <thead>
                            <tr>
                                <th class="text-center">Account Name</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Debit</th>
                                <th class="text-center">Credit</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="debitvoucher">
                            <?php
                                        $sl = 1;
                                        $dbt = $cdt = 0;
                                        foreach ($journal_info as $single) {
                                            ?>
                            <tr>
                                <td class="form-group">
                                    <select name="cmbCode[]" id="cmbCode_<?php echo $sl; ?>"
                                        class="form-control basic-single" data-live-search="true"
                                        onchange="load_code(this.value,<?php echo $sl; ?>)">
                                        <?php foreach ($acc as $acc1) { ?>
                                        <option value="<?php echo html_escape($acc1->HeadCode); ?>" <?php
                                                            if ($single->COAID == $acc1->HeadCode) {
                                                                echo 'selected';
                                                            }
                                                            ?>><?php echo html_escape($acc1->HeadName); ?></option>
                                        <?php } ?>
                                    </select>

                                </td>
                                <td><input type="text" name="txtCode[]" class="form-control text-center"
                                        id="txtCode_<?php echo $sl; ?>" required
                                        value="<?php echo html_escape($single->COAID); ?>"></td>
                                <td><input type="text" name="txtAmount[]" class="form-control total_price text-right"
                                        value="<?php echo html_escape($single->Debit);
                                                            $dbt += $single->Debit; ?>" placeholder="0"
                                        id="txtAmount_<?php echo $sl; ?>" onkeyup="calculation(<?php echo $sl; ?>)"
                                        required>
                                </td>
                                <td>
                                    <input type="text" name="txtAmountcr[]" class="form-control total_price1 text-right"
                                        value="<?php echo html_escape($single->Credit);
                                                            $cdt += $single->Credit; ?>" placeholder="0"
                                        id="txtAmount1_<?php echo $sl; ?>" onkeyup="calculation(<?php echo $sl; ?>)" required>
                                </td>
                                <td>
                                    <button class="btn btn-danger red t_right" type="button" value="Delete"
                                        onclick="deleteRow(this)"><i class="ti-trash"></i></button>
                                </td>
                            </tr>
                            <?php
                                            $sl++;
                                        }
                                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="button" id="add_more" class="btn btn-info" name="add_more"
                                        onClick="addaccountUpdate('debitvoucher');"
                                        value="<?php echo display('add_more') ?>" />
                                </td>




                                <td colspan="1" class="text-right"><label for="reason"
                                        class="  col-form-label"><?php echo display('total') ?></label>
                                </td>



                                <td class="text-right">
                                    <input type="text" id="grandTotal" class="form-control text-right "
                                        name="grand_total" value="<?php echo number_format($dbt, 2, '.', ','); ?>"
                                        readonly="readonly" placeholder="0" />
                                </td>
                                <td class="text-right">
                                    <input type="text" id="grandTotal1" class="form-control text-right "
                                        name="grand_total1" value="<?php echo number_format($cdt, 2, '.', ','); ?>"
                                        readonly="readonly" placeholder="0" />
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
                <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                <div class="form-group row">

                    <div class="col-sm-12 text-right">

                        <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save"
                            value="<?php echo display('update') ?>" tabindex="9" />

                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<div id="cntra" hidden>
    <?php foreach ($acc as $acc2) {?><option value='<?php echo html_escape($acc2->HeadCode);?>'>
        <?php echo html_escape($acc2->HeadName);?></option><?php }?>
</div>