<?php
include ('Class/CConManager.php');
include ('Class/Ccommon.php');
include ('Class/CResult.php');
include ('Class/CAccount.php');
?>

<?php
if(isset($_POST['btnSave']))
{

    $oAccount=new CAccount();
    $oResult=new CResult();
    $Semester='';
    $Department='';

    if(isset($_POST['cmbSemester']))
        $Semester=$_POST['cmbSemester'];
    if(isset($_POST['cmbDepartment']))
        $Department=$_POST['cmbDepartment'];

    $HeadCode=$_POST['txtCode'];
    $HeadName=$_POST['txtName'];
    $FromDate=$_POST['dtpFromDate'];
    $ToDate=$_POST['dtpToDate'];


    $sql="SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
              WHERE VDate < '$FromDate' AND COAID LIKE '$HeadCode%' AND IsAppove =1 ";
    $sql.="GROUP BY IsAppove, COAID";
    $oResult=$oAccount->SqlQuery($sql);
    $PreBalance=0;

    if($oResult->num_rows>0)
    {
        $PreBalance=$oResult->row['Debit'];
        $PreBalance=$PreBalance- $oResult->row['Credit'];
    }

    $sql="SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration 
		FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
        WHERE acc_transaction.IsAppove =1 AND acc_transaction.VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID LIKE '$HeadCode%' ";

    $sql.="GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
               HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0
               ORDER BY  acc_transaction.VDate, acc_transaction.VNo";

    $oResult=$oAccount->SqlQuery($sql);
   
}
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo display('cash_book')?>
                </h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('accounts/cash-book') ?>
                <div class="row" id="">
                    <div class="col-sm-6">

                        <input type="hidden" id="txtCode" name="txtCode" value="1020101" />
                        <input type="hidden" id="txtName" name="txtName" size="40" value="Cash In Hand" />

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpFromDate" value="<?php echo date('Y-m-d')?>"
                                    placeholder="<?php echo display('date') ?>" class="datepickers form-control"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpToDate" value="<?php echo date('Y-m-d')?>"
                                    placeholder="<?php echo display('date') ?>" class="datepickers form-control"
                                    required>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" name="btnSave"
                                class="btn btn-success w-md m-b-5"><?php echo display('find') ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>


<?php if (!empty($_POST)){ ?>
<div class="row mt-4">
    <div class="col-sm-12 col-md-12">
        <div class="card card-bd lobidrag">
            <div class="card-header">
                <h4 id="ReportName" class="voucher"><b><?php echo display('cash_book_voucher')?></b>
                    <small class="float-right" id="print">
                        <input type="button" class="btn btn-info text-white button-print" name="btnPrint" id="btnPrint"
                            value="Print" onclick="printContent('printArea')" />
                    </small>
                </h4>
                <div class="card-body table-responsive" id="printArea">
                    <div>
                        <div align="center" class="report mb-4">
                            <font size="+1" class=""> <strong><?php echo display('cash_book_report_on')?><br>
                                    <?php echo html_escape((!empty($FromDate)?$FromDate:null)); ?>
                                    <?php echo display('end_date')?>
                                    <?php echo html_escape((!empty($ToDate)?$ToDate:null));?></strong></font>
                        </div>
                        <table width="100%" class="datatable table-bordered table-striped table-hover">
                            <thead>
                                <tr class="table_head tbl_head">
                                    <td height="25"><strong><?php echo display('sl')?></strong></td>
                                    <td align="center"><strong><?php echo display('transaction_date')?></strong></td>
                                    <td align="center"><strong><?php echo display('voucher_no')?></strong></td>
                                    <td align="center"><strong><?php echo display('voucher_type')?></strong></td>
                                    <td align="center"><strong><?php echo display('particulars')?></strong></td>
                                    <td width="11%" align="right"><strong><?php echo display('debit')?></strong></td>
                                    <td width="11%" align="right"><strong><?php echo display('credit')?></strong></td>
                                    <td align="right"><strong><?php echo display('balance')?></strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $TotalCredit=0;
                        $TotalDebit=0;
                        $VNo="";
                        $CountingNo=1;
                        for($i=0;$i<(!empty($oResult->num_rows)?$oResult->num_rows:null);$i++)
                        {
                            if($i&1)
                                $bg="#F8F8F8";
                            else
                                $bg="#FFFFFF";
                            ?>
                                <tr class="table_data">
                                    <?php
                                if($VNo!=$oResult->rows[$i]['VNo'])
                                {
                                    ?>
                                    <td height="25" bgcolor="<?php echo $bg; ?>"><?php echo $CountingNo++;?></td>
                                    <td bgcolor="<?php echo $bg; ?>">
                                        <?php echo substr($oResult->rows[$i]['VDate'],0,10);?></td>
                                    <td align="left" bgcolor="<?php echo $bg; ?>"><?php
                                        if($oResult->rows[$i]['Vtype']=="MR")
                                            echo "<a href=\"?Acc=MoneyRecept&VNo=".base64_encode($oResult->rows[$i]['VNo'])."\" target='_blank'><img src='ic/page.png' alt='Money Receipt Reprint' title='Money Receipt Reprint'></a> &nbsp;";
                                        else if($oResult->rows[$i]['Vtype']=="AVR")
                                        {
                                            $sql="SELECT * FROM advising_register WHERE VNo='".$oResult->rows[$i]['VNo']."'";
                                            $oResultRegi=$oAccount->SqlQuery($sql);
                                        }
                                        else if($oResult->rows[$i]['Vtype']=="AD")
                                        {
                                        }
                                        echo html_escape($oResult->rows[$i]['VNo']);
                                        ?></td>
                                    <td align="justify" bgcolor="<?php echo $bg; ?>"><?php echo html_escape($oResult->rows[$i]['Vtype']);
                                            ?>
                                    </td>

                                    <?php
                                    $VNo=$oResult->rows[$i]['VNo'];
                                }
                                else
                                {
                                    ?>
                                    <td bgcolor="<?php echo $bg; ?>" colspan=""><?php echo $CountingNo++;?></td>
                                    <td bgcolor="<?php echo $bg; ?>" colspan="">&nbsp;</td>
                                    <td bgcolor="<?php echo $bg; ?>" colspan="">&nbsp;</td>
                                    <td bgcolor="<?php echo $bg; ?>" colspan="">&nbsp;</td>

                                    <?php
                                }
                                ?>
                                    <td align="justify" bgcolor="<?php echo $bg; ?>">
                                        <?php echo html_escape($oResult->rows[$i]['HeadName']);?></td>
                                    <td align="right" bgcolor="<?php echo $bg; ?>"><?php
                                    $TotalDebit += $oResult->rows[$i]['Debit'];
                                    $PreBalance += $oResult->rows[$i]['Debit'];
                                    echo number_format($oResult->rows[$i]['Debit'],2,'.',',');?></td>
                                    <td align="right" bgcolor="<?php echo $bg; ?>"><?php
                                    $TotalCredit += $oResult->rows[$i]['Credit'];
                                    $PreBalance -= $oResult->rows[$i]['Credit'];
                                    echo number_format($oResult->rows[$i]['Credit'],2,'.',',');?></td>
                                    <td align="right" bgcolor="<?php echo $bg; ?>">
                                        <?php echo number_format($PreBalance,2,'.',','); ?></td>
                                </tr>
                                <?php
                        }
                        ?>
                            </tbody>
                            <tfoot>
                                <tr class="table_data tbl_data">
                                    <td bgcolor="green">&nbsp;</td>
                                    <td align="center" bgcolor="green">&nbsp;</td>
                                    <td align="center" bgcolor="green">&nbsp;</td>
                                    <td align="center" bgcolor="green">&nbsp;</td>
                                    <td align="right" bgcolor="green"><strong>Total</strong></td>
                                    <td align="right" bgcolor="green">
                                        <?php echo number_format($TotalDebit,2,'.',','); ?></td>
                                    <td align="right" bgcolor="green">
                                        <?php echo number_format($TotalCredit,2,'.',','); ?></td>
                                    <td align="right" bgcolor="green">
                                        <?php echo number_format((!empty($PreBalance)?$PreBalance:null),2,'.',','); ?>
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
<?php } ?>