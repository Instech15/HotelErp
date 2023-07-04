<?php
include('Class/CConManager.php');
include('Class/CResult.php');
include('Class/CAccount.php');
include('Class/Ccommon.php');
?>

<?php
if (isset($_POST['btnSave'])) {
    $oAccount = new CAccount();
    $oResult = new CResult();

    $HeadCode = $_POST['txtCode'];
    $HeadName = $_POST['txtName'];
    $FromDate = $_POST['dtpFromDate'];
    $ToDate = $_POST['dtpToDate'];

    $PreBalance = 0;

    if ($oResult->num_rows > 0) {
        $PreBalance = $oResult->row['Debit'];
        $PreBalance = $PreBalance - $oResult->row['Credit'];
    }
    $query = $this->db->select("HeadCode")->from("acc_coa")->where("PHeadName", $HeadName)->where("IsActive",1)->get()->result();
    if($query){
        foreach($query as $key => $val){
            $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
            WHERE VDate < '$FromDate 00:00:00' AND COAID = '$val->HeadCode' AND IsAppove =1 ";

            $sql .= "GROUP BY IsAppove, COAID";

            $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration 
                FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
                WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate 00:00:00' AND '$ToDate 00:00:00' AND acc_transaction.COAID='$val->HeadCode'";

            $sql .= "ORDER BY  acc_transaction.VDate, acc_transaction.VNo";

            $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
                    FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
                    WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate 00:00:00' AND '$ToDate 00:00:00' AND VNo in (SELECT VNo FROM acc_transaction acc WHERE acc.COAID = '$val->HeadCode') AND COAID = '$val->HeadCode' ";

            $sql .= "GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
                    HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0
                    ORDER BY  acc_transaction.VDate, acc_transaction.VNo";

            $result[$key] = $oResult = $oAccount->SqlQuery($sql);
        }
    }else{
        $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
              WHERE VDate < '$FromDate 00:00:00' AND COAID = '$HeadCode' AND IsAppove =1 ";

        $sql .= "GROUP BY IsAppove, COAID";
        $oResult = $oAccount->SqlQuery($sql);

        $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration 
            FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
            WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate 00:00:00' AND '$ToDate 00:00:00' AND acc_transaction.COAID='$HeadCode'";

        $sql .= "ORDER BY  acc_transaction.VDate, acc_transaction.VNo";

        $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
                FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
                WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate 00:00:00' AND '$ToDate 00:00:00' AND VNo in (SELECT VNo FROM acc_transaction acc WHERE acc.COAID = '$HeadCode') AND COAID = '$HeadCode' ";

        $sql .= "GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
                HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0
                ORDER BY  acc_transaction.VDate, acc_transaction.VNo";

        $result[0] = $oResult = $oAccount->SqlQuery($sql);
    }
}
?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo display('bank_book') ?></h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('accounts/bank-book') ?>
                <div class="row" id="">
                    <input type="hidden" id="txtName" name="txtName" />
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('gl_head') ?></label>
                            <div class="col-sm-8">

                                <select name="cmbCode" class="form-control basic-single" id="cmbCode" required onchange="cmbCode_onchange()">
                                    <option value=''><?php echo display("select_option"); ?></option>
                                    <option value='1020102'><?php echo display("cash_at_bank"); ?></option>
                                    <?php $oCommon = new CCommon();
                                    $oCommon->ReadAllBankCOA('HeadCode', 'HeadName', '');
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('account_code') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="txtCode" id="txtCode" size="40" readonly="readonly" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpFromDate" value="<?php echo date('Y-m-d') ?>" placeholder="<?php echo display('date') ?>" class="datepickers form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpToDate" value="<?php echo date('Y-m-d') ?>" placeholder="<?php echo display('date') ?>" class="datepickers form-control">
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" name="btnSave" class="btn btn-success w-md m-b-5"><?php echo display('find') ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_open() ?>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($_POST)) { ?>
    <div class="row mt-4">
        <div class="col-sm-12 col-md-12">
            <div class="card card-bd lobidrag">
                <div class="card-heading">
                    <div class="card-header">
                        <h4 id="ReportName" class="voucher"><b><?php echo display('bank_book_voucher') ?></b>
                            <small class="float-right" id="print">
                                <input type="button" class="btn btn-info text-white button-print" name="btnPrint" id="btnPrint" value="Print" onclick="printContent('printArea')" />
                            </small>
                        </h4>
                    </div>
                    <div class="card-body" id="printArea">
                        <div>
                        </div>
                        <tr>
                            <div align="center" class="report">
                                <h4>
                                    <font size="+1" class=""> <strong><?php echo display('bank_book_report_of') ?><br>
                                            <?php echo html_escape((!empty($HeadName) ? $HeadName : null)); ?>
                                            <?php echo display('start_date') ?>
                                            <?php echo html_escape((!empty($FromDate) ? $FromDate : null)); ?>
                                            <?php echo display('end_date') ?>
                                            <?php echo html_escape((!empty($ToDate) ? $ToDate : null)); ?></strong></font>
                                    <strong>
                                </h4>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="datatable table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="table_head tbl_head">
                                                <td height="25"><strong><?php echo display('sl') ?></strong></td>
                                                <td align="center"><strong><?php echo display('transaction_date') ?></strong>
                                                </td>
                                                <td align="center"><strong><?php echo display('voucher_no') ?></strong></td>
                                                <td align="right"><strong><?php echo display('voucher_type') ?></strong></td>
                                                <td align="center"><strong><?php echo display('head_of_account') ?></strong></td>
                                                <td width="11%" align="right"><strong><?php echo display('debit') ?></strong>
                                                </td>
                                                <td width="11%" align="right"><strong><?php echo display('credit') ?></strong>
                                                </td>
                                                <td align="right"><strong><?php echo display('balance') ?></strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $TotalCredit = 0;
                                            $TotalDebit = 0;
                                            $VNo = "";
                                            $CountingNo = 1;
                                            for ($j = 0; $j < count((!empty($result) ? $result : null)); $j++) {
                                            for ($i = 0; $i < (!empty($result[$j]->num_rows) ? $result[$j]->num_rows : null); $i++) {
                                                if ($i & 1)
                                                    $bg = "#E7E0EE";
                                                else
                                                    $bg = "#FFFFFF";
                                            ?>
                                                <tr class="table_data">
                                                    <?php
                                                    if ($VNo != $result[$j]->rows[$i]['VNo']) {
                                                    ?>
                                                        <td height="25" bgcolor="<?php echo $bg; ?>"><?php echo $CountingNo++; ?></td>
                                                        <td bgcolor="<?php echo $bg; ?>">
                                                            <?php echo substr($result[$j]->rows[$i]['VDate'], 0, 10); ?>
                                                        </td>
                                                        <td align="left" bgcolor="<?php echo $bg; ?>"><?php
                                                                                                        if ($result[$j]->rows[$i]['Vtype'] == "MR")
                                                                                                            echo "<a href=\"?Acc=MoneyRecept&VNo=" . base64_encode($result[$j]->rows[$i]['VNo']) . "\" target='_blank'><img src='ic/page.png' alt='Money Receipt Reprint' title='Money Receipt Reprint'></a> &nbsp;";
                                                                                                        else if ($result[$j]->rows[$i]['Vtype'] == "AVR") {
                                                                                                            $sql = "SELECT * FROM advising_register WHERE VNo='" . $result[$j]->rows[$i]['VNo'] . "'";
                                                                                                            $oResultRegi = $oAccount->SqlQuery($sql);
                                                                                                        } else if ($result[$j]->rows[$i]['Vtype'] == "AD") {
                                                                                                        }
                                                                                                        echo html_escape($result[$j]->rows[$i]['VNo']);
                                                                                                        ?></td>
                                                        <td align="right" bgcolor="<?php echo $bg; ?>">
                                                            <?php echo trim($result[$j]->rows[$i]['Vtype']);
                                                            ?>
                                                        </td>
                                                    <?php
                                                        $VNo = $result[$j]->rows[$i]['VNo'];
                                                    } else {
                                                    ?>
                                                        <td bgcolor="<?php echo $bg; ?>">&nbsp;</td>
                                                        <td bgcolor="<?php echo $bg; ?>">&nbsp;</td>
                                                        <td bgcolor="<?php echo $bg; ?>">&nbsp;</td>
                                                        <td bgcolor="<?php echo $bg; ?>">&nbsp;</td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td align="center" bgcolor="<?php echo $bg; ?>">
                                                        <?php echo html_escape($result[$j]->rows[$i]['HeadName']); ?></td>
                                                    <td align="right" bgcolor="<?php echo $bg; ?>"><?php
                                                                                                    $TotalDebit += $result[$j]->rows[$i]['Debit'];
                                                                                                    $PreBalance += $result[$j]->rows[$i]['Debit'];
                                                                                                    echo number_format($result[$j]->rows[$i]['Debit'], 2, '.', ','); ?></td>
                                                    <td align="right" bgcolor="<?php echo $bg; ?>"><?php
                                                                                                    $TotalCredit += $result[$j]->rows[$i]['Credit'];
                                                                                                    $PreBalance -= $result[$j]->rows[$i]['Credit'];
                                                                                                    echo number_format($result[$j]->rows[$i]['Credit'], 2, '.', ','); ?></td>
                                                    <td align="right" bgcolor="<?php echo $bg; ?>">
                                                        <?php printf("%.2f", $PreBalance); ?></td>
                                                </tr>
                                            <?php
                                            }
                                            }
                                            ?>
                                        <tbody>
                                        <tfoot>
                                            <tr class="table_data tbl_data">
                                                <td bgcolor="green">&nbsp;</td>
                                                <td align="center" bgcolor="green">&nbsp;</td>
                                                <td align="center" bgcolor="green">&nbsp;</td>
                                                <td align="center" bgcolor="green">&nbsp;</td>
                                                <td align="right" bgcolor="green"><strong>Total</strong></td>
                                                <td align="right" bgcolor="green">
                                                    <?php echo number_format($TotalDebit, 2, '.', ','); ?>
                                                </td>
                                                <td align="right" bgcolor="green">
                                                    <?php echo number_format($TotalCredit, 2, '.', ','); ?>
                                                </td>
                                                <td align="right" bgcolor="green">
                                                    <?php echo number_format((!empty($PreBalance) ? $PreBalance : null), 2, '.', ','); ?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script src="<?php echo MOD_URL . $module; ?>/assets/js/cmb_code.js"></script>