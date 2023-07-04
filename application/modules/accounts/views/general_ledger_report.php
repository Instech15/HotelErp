<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo display('general_ledger'); ?>
                    <small class="float-right" id="print">
                        <input type="button" class="btn btn-info text-white button-print" name="btnPrint" id="btnPrint"
                            value="Print" onclick="printContent('printArea')" />
                    </small>
                </h4>
            </div>
            <div class="card-body" id="printArea">
                <div class="report" align="center">
                    <h4 colspan="7">
                        <font size="+1">
                            <strong><?php echo display('general_ledger_of') . '<br>' . (!empty($ledger->HeadName) ? $ledger->HeadName : null) . ' on ' . $dtpFromDate . ' To '  . $dtpToDate; ?></strong>
                        </font><strong>
                    </h4></strong>
                </div>
                <div class="table-responsive">
                    <table width='100%' class="datatable table-bordered table-striped table-hover" border="2">

                        <thead>
                            <tr>
                                <td height="25"><strong><?php echo display('sl'); ?></strong></td>
                                <td><strong><?php echo html_escape((!empty($Trans) ? $Trans : null)) ? "Transaction Date" : "Head Code"; ?></strong>
                                </td>
                                <td><strong><?php echo html_escape((!empty($Trans) ? $Trans : null)) ? "Voucher No" : "Head Name"; ?></strong>
                                </td>
                                <?php
                                if ($chkIsTransction) {
                                ?>
                                <td><strong><?php echo display('particulars') ?></strong></td>
                                <?php
                                }
                                ?>
                                <td align="right"><strong><?php echo display('debit'); ?></strong></td>
                                <td align="right"><strong><?php echo display('credit'); ?></strong></td>
                                <td align="right"><strong><?php echo display('balance'); ?></strong></td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ((!empty($error) ? $error : null)) {
                            ?>

                            <tr>
                                <td height="25"></td>
                                <td></td>
                                <td><?php echo display('no_report') ?>.</td>
                                <?php
                                    if ($chkIsTransction) {
                                    ?>
                                <td></td>
                                <?php
                                    }
                                    ?>
                                <td align="right"></td>
                                <td align="right"></td>
                                <td align="right"></td>
                            </tr>

                            <?php
                            } else {
                                $TotalCredit = 0;
                                $TotalDebit = 0;
                                $CurBalance = $prebalance;
                                foreach ($HeadName2 as $key => $data) {
                                ?>
                            <tr>
                                <td height="25"><?php echo ++$key; ?></td>
                                <td><?php echo html_escape($data->COAID); ?></td>
                                <td><?php echo html_escape($data->HeadName); ?></td>
                                <?php
                                        if ($chkIsTransction) {
                                        ?>
                                <td><?php echo html_escape($data->Narration); ?></td>
                                <?php
                                        }
                                        ?>

                                <td align="right"><?php echo  number_format($data->Debit, 2, '.', ','); ?></td>
                                <td align="right"><?php echo  number_format($data->Credit, 2, '.', ','); ?></td>
                                <?php
                                        $TotalDebit += $data->Debit;
                                        $CurBalance += $data->Debit;

                                        $TotalCredit += $data->Credit;
                                        $CurBalance -= $data->Credit;
                                        ?>
                                <td align="right"><?php echo  number_format($CurBalance, 2, '.', ','); ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="table_data">
                                <?php
                                if ($chkIsTransction)
                                    $colspan = 4;
                                else
                                    $colspan = 3;
                                ?>
                                <td colspan="<?php echo $colspan; ?>" align="right">
                                    <strong><?php echo display('total') ?></strong>
                                </td>
                                <td align="right">
                                    <strong><?php echo number_format((!empty($TotalDebit) ? $TotalDebit : null), 2, '.', ','); ?></strong>
                                </td>
                                <td align="right">
                                    <strong><?php echo number_format($TotalCredit, 2, '.', ','); ?></strong></td>
                                <td align="right">
                                    <strong><?php echo number_format($CurBalance, 2, '.', ','); ?></strong></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tfoot>


                        <h4>
                            <?php echo display('pre_balance') ?> :
                            <?php echo number_format($prebalance, 2, '.', ','); ?>
                            <br /> <?php echo display('current_balance') ?> :
                            <?php echo number_format($CurBalance, 2, '.', ','); ?>
                        </h4>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>