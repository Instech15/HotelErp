<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card card-bd lobidrag">
            <div class="card-header">
                <div class="card-title">
                    <h4><?php echo display('trial_balance')?>
                        <small class="float-right" id="print">
                            <input type="button" class="btn btn-info button-print text-white" name="btnPrint" id="btnPrint"
                                value="Print" onclick="printContent('printArea')" />
                        </small>
                    </h4>
                </div>
            </div>
            <div>
                <div class="card-body" id="printArea">
                    <table width="100%" class="table_boxnew padding_5px" cellpadding="5" cellspacing="0">
                        <tr>
                            <td colspan="4" align="center">
                                <h3 class="f_size_18"><?php echo display('trial_balance');?><br />
                                    <?php echo display('as_on')?> <?php echo html_escape($dtpFromDate); ?>
                                    <?php echo display('end_date')?> <?php echo html_escape($dtpToDate);?></h3>
                            </td>
                        </tr>
                        <tr class="table_head">
                            <td width="20%" align="center" class="b_left_top">
                                <strong><?php echo display('code')?></strong></td>
                            <td width="50%" align="center" class="b_left_top">
                                <strong><?php echo display('account_name')?></strong></td>
                            <td width="15%" align="center" class="b_left_top">
                                <strong><?php echo display('debit')?></strong></td>
                            <td width="15%" align="center" class="b_left_right_top">
                                <strong><?php echo display('credit')?></strong></td>
                        </tr>
                        <?php
                            $TotalCredit=0;
                            $TotalDebit=0;  
                            $k=0;
                                for($i=0;$i<count($oResultTr);$i++)
                            {
                                $COAID=$oResultTr[$i]['HeadCode'];
                                $Name=$oResultTr[$i]['HeadName'];
                                
                                $sql="SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction LEFT JOIN acc_coa ac ON ac.HeadCode=acc_transaction.COAID WHERE acc_transaction.IsAppove =1 AND ac.IsTransaction=1 AND ac.IsActive=1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND PHeadName = '$Name' ";
                                
                            

                                $q1=$this->db->query($sql);
                                $oResultTrial = $q1->row();


                                $bg=$k&1?"#FFFFFF":"#E7E0EE";
                                if($oResultTrial->Debit>$oResultTrial->Credit)
                                {
                                $k++; ?>
                                            <tr class="table_data">
                                                <td align="left" bgcolor="<?php echo $bg;?>" class="b_left_top"><a
                                                        href="javascript:"><?php echo html_escape($oResultTr[$i]['HeadCode']);?>
                                                    </a>
                                                </td>
                                                <td align="left" bgcolor="<?php echo $bg;?>" class="b_left_top">
                                                    <?php echo html_escape($oResultTr[$i]['HeadName']);?></td>
                                                <?php
                                if($oResultTrial->Debit>$oResultTrial->Credit)
                            {
                            ?>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_top"><?php 
                                $TotalDebit += $oResultTrial->Debit-$oResultTrial->Credit;
                            echo number_format($oResultTrial->Debit-$oResultTrial->Credit,2);
                            ?></td>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_right_top"><?php
                            echo number_format('0.00',2);?></td>
                                                <?php
                            }
                            else
                            {
                            ?>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_top"></td>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_right_top"></td>
                                                <?php
                            }
                            ?>
                                            </tr>
                                            <?php
                                }
                            } 
                            
                            for($i=0;$i<count($oResultInEx);$i++)
                            {
                                $COAID=$oResultInEx[$i]['HeadCode'];
                                $Name=$oResultInEx[$i]['HeadName'];
                                
                                $sql="SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction LEFT JOIN acc_coa ac ON ac.HeadCode=acc_transaction.COAID WHERE acc_transaction.IsAppove =1 AND ac.IsTransaction=1 AND ac.IsActive=1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND PHeadName = '$Name' ";
                            

                                $q2=$this->db->query($sql);
                                $oResultTrial = $q2->row();

                                $bg=$k&1?"#FFFFFF":"#E7E0EE";
                                if($oResultTrial->Credit+$oResultTrial->Debit>0)
                                {
                                $k++; ?>
                                            <tr class="table_data">
                                                <td align="left" bgcolor="<?php echo $bg;?>" class="b_left_top"><a
                                                        href="javascript:"><?php echo html_escape($oResultInEx[$i]['HeadCode']);?>
                                                    </a>
                                                </td>
                                                <td align="left" bgcolor="<?php echo $bg;?>" class="b_left_top">
                                                    <?php echo html_escape($oResultInEx[$i]['HeadName']);?></td>
                                                <?php
                                if($oResultTrial->Debit>$oResultTrial->Credit)
                            {
                            ?>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_top"><?php 
                                $TotalDebit += $oResultTrial->Debit-$oResultTrial->Credit;
                            echo number_format($oResultTrial->Debit-$oResultTrial->Credit,2);
                            ?></td>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_right_top"><?php
                            echo number_format('0.00',2);?></td>
                                                <?php
                            }
                            else
                            {
                            ?>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_top"><?php 
                            echo number_format('0.00',2);
                            ?></td>
                                                <td align="right" bgcolor="<?php echo $bg;?>" class="b_left_right_top"><?php 
                                $TotalCredit += $oResultTrial->Credit-$oResultTrial->Debit;
                            echo number_format($oResultTrial->Credit-$oResultTrial->Debit,2);?></td>
                                                <?php
                            }
                            ?>
                                            </tr>
                                            <?php
                                }
                            } 
                            ?>
                        <tr class="table_head">
                            <td colspan="2" align="right" class="b_left_top_bottom">
                                <strong><?php echo display('total')?></strong></td>
                            <td align="right" class="b_left_top_bottom">
                                <strong><?php echo number_format($TotalDebit,2); ?></strong></td>
                            <td align="right" class="b_left_right_bottom_top">
                                <strong><?php echo number_format( $TotalCredit,2); ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center">
                                <table width="100%" cellpadding="1" cellspacing="20" class="mt_50">
                                    <tr>
                                        <td width="20%" class="b_top_1px" align="center">
                                            <?php echo display('prepared_by')?></td>
                                        <td width="20%" class="b_top_1px" align="center">
                                            <?php echo display('account_official')?></td>
                                        <td width="20%" class="b_top_1px" align='center'>
                                            <?php echo "Chairman"; ?></td>
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