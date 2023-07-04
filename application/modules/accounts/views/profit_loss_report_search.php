<?php
    $GLOBALS['TotalAssertF']   = 0;
    $GLOBALS['TotalLiabilityF']= 0;
  function AssertCoa($HeadName,$HeadCode,$GL,$oResultAsset,$Visited,$value,$dtpFromDate,$dtpToDate,$check,$tax=NULL){
      
      $CI =& get_instance();

      if($tax){
        $sqlF="SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID = '$HeadCode'";
        $q1 = $CI->db->query($sqlF);
        $oResultAmountPreF = $q1->row();
        $GLOBALS['TotalLiabilityF'] = $oResultAmountPreF->Amount;
      }
      if($value==1)
      { 
          ?>
<tr>
    <td colspan="2" class="f_size_f_weight_b_left_right_top"><?php echo html_escape($HeadName);?></td>
</tr>
<?php
      }
      elseif($value>1)
      {
        $COAID=$HeadCode;
        if($check)
        {
          $sqlF="SELECT SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID LIKE '$COAID%'";
        }
        else
        {
          $sqlF="SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID LIKE '$COAID%'";
        }
        $q1 = $CI->db->query($sqlF);
        $oResultAmountPreF = $q1->row();
        if($value==2)
        {
          if($check==1)
          {
            $oResultAmountPreF->Amount;
            $GLOBALS['TotalLiabilityF']=$GLOBALS['TotalLiabilityF']+$oResultAmountPreF->Amount;
          }
          else
          {
            $GLOBALS['TotalAssertF']=$GLOBALS['TotalAssertF']+$oResultAmountPreF->Amount;
          }
        }

      if($oResultAmountPreF->Amount!=0)
      {
      ?>
<tr>
    <td align="left" style="b_left_b_right_f_size<?php echo (int)(20-$value*1.5)."px;";
          echo ($value<=3?" font-weight:bold; ":" ");
          ?>"><?php echo ($value>=3?"&nbsp;&nbsp;":""). $HeadName; ?></td>
    <td align="right" class="b_left_right_top"><?php echo number_format($oResultAmountPreF->Amount,2);?></td>
</tr>
<?php
      }
      }
      for($i=0;$i<count($oResultAsset);$i++)
      {
        if (!$Visited[$i]&&$GL==0)
        {
          if ($HeadName==$oResultAsset[$i]->PHeadName)
          {
            $Visited[$i]=true;
            AssertCoa($oResultAsset[$i]->HeadName,$oResultAsset[$i]->HeadCode,$oResultAsset[$i]->IsGL,$oResultAsset,$Visited,$value+1,$dtpFromDate,$dtpToDate,$check);
          }
        }
      }
    }

?>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo display('profit_loss')?>
                    <small class="float-right" id="print">
                        <input type="button" class="btn btn-info button-print text-white" name="btnPrint" id="btnPrint"
                            value="Print" onclick="printContent('printArea')" />
                    </small>
                </h4>
            </div>
            <div>
                <div class="card-body" id="printArea">
                    <table width="100%" class="table_boxnew" cellpadding="5" cellspacing="0">
                        <tr>
                            <td colspan="2" align="center" class="f_size_20">
                                <b><?php echo display('statement_of_comprehensive_income') ?><br /><?php echo display('start_date')?>
                                    <?php echo html_escape($dtpFromDate) ?> <?php echo display('end_date')?>
                                    <?php echo html_escape($dtpToDate);?></b>
                            </td>
                        </tr>
                        <tr>
                            <td width="85%" bgcolor="#E7E0EE" align="center" class="f_size_b_left_top">
                                <?php echo display('particulars')?></td>
                            <td width="15%" bgcolor="#E7E0EE" align="center" class="f_size_b_left_right_top">
                                <?php echo display('amount')?></td>
                        </tr>
                        <?php
                    for($i=0;$i<count($oResultAsset);$i++)
                    {
                      $Visited[$i] = false;
                    }

                    AssertCoa("COA","0",0,$oResultAsset,$Visited,0,$dtpFromDate,$dtpToDate,0);

                    $TotalAssetF=$GLOBALS['TotalAssertF'];
                    ?>
                        <tr bgcolor="#E7E0EE">
                            <td align="right"><strong><?php echo display('total_income')?></strong></td>
                            <td align="right" class="b_style_b_letft_right_top">
                                <strong><?php echo number_format($TotalAssetF,2); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"></td>
                        </tr>
                        <?php
                    for($i=0;$i<count($oResultLiability);$i++)
                    {
                      $Visited[$i] = false;
                    }
                    $GLOBALS['TotalLiability']=0;
                    AssertCoa("COA","0",0,$oResultLiability,$Visited,0,$dtpFromDate,$dtpToDate,1);
                    $TotalLibilityF=$GLOBALS['TotalLiabilityF'];
                    ?>
                        <tr bgcolor="#E7E0EE">
                            <td align="right"><strong><?php echo display('total_expenses')?></strong></td>
                            <td align="right" class="b_style_b_letft_right_top">
                                <strong><?php echo number_format($TotalLibilityF,2); ?></strong>
                            </td>
                        </tr>
                        <tr>
                        <?php
                    if($withTax){
                        for($i=0;$i<count($oResultTax);$i++)
                        {
                        $Visited[$i] = false;
                        }
                        $GLOBALS['TotalLiabilityF']=0;
                        AssertCoa("Tax","5020303",0,$oResultTax,$Visited,0,$dtpFromDate,$dtpToDate,1,$withTax);
                        $TotalTaxF=$GLOBALS['TotalLiabilityF'];
                        ?>
                            <tr bgcolor="#E7E0EE">
                                <td align="right"><strong><?php echo display("tax"); ?></strong></td>
                                <td align="right" class="b_style_b_letft_right_top">
                                    <strong><?php echo number_format($TotalTaxF,2); ?></strong>
                                    <strong><?php $TotalLibilityF+=$TotalTaxF; ?></strong>
                                </td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td align="right" class="b_left_top_bottom">
                                    <h4>Profit-Loss
                                        <?php echo html_escape($TotalAssetF>$TotalLibilityF)?"(Profit)":"(Loss)";?></h4>
                                </td>
                                <td align="right" class="b_solid">
                                    <b><?php echo number_format($TotalAssetF-$TotalLibilityF,2); ?></b>
                                </td>
                            </tr>
                        <tr bgcolor="#FFF">
                            <td colspan="2" align="center" height="120" valign="bottom">
                                <table width="100%" cellpadding="1" cellspacing="20">
                                    <tr>
                                        <td width="20%" class="b_top_1px" align="center">
                                            <?php echo display('prepared_by')?></td>
                                        <td width="20%" class="b_top_1px" align="center">
                                            <?php echo display('accounts')?></td>
                                        <td width="20%" class="b_top_1px" align="center">
                                            <?php echo display('authorized_signature')?></td>
                                        <td width="20%" class="b_top_1px" align='center'>
                                            <?php echo "Chairman" ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>