<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/balance_sheet.css">
<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo display('balance_sheet') ?></h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('accounts/accounts/balance_sheet') ?>
                <div class="row" id="">
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpFromDate" value="<?php echo date('Y-m-d')?>"
                                    placeholder="<?php echo display('from_date') ?>" class="datepickers form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpToDate" value="<?php echo date('Y-m-d')?>"
                                    placeholder="<?php echo display('to_date') ?>" class="datepickers form-control">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit"
                                class="btn btn-success w-md m-b-5"><?php echo display('find') ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo display('balance_sheet')." ".display('report')?>
                    <small class="float-right" id="print">
                        <input type="button" class="btn btn-info text-white button-print" name="btnPrint" id="btnPrint"
                            value="Print" onclick="printContent('printArea')" />
                    </small>
                </h4>
            </div>

            <div class="card-body" id="printArea">
                <div class="paddin5ps">
                    <table class="print-table " width="100%">

                        <tr>

                            <td align="right" class="print-table-tr">
                                <date>
                                    <?php echo display('date')?>: <?php
                                            echo date('d-M-Y');
                                            ?>
                                </date>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                                <h2 class="statement"><?php echo display('balance_sheet_statement'); ?> </h2>
                            </td>
                        </tr>
                        <tr class="table_head">
                            <td colspan="3" align="center" class="equivalent"><b>On
                                    <?php echo html_escape($from_date); ?> To
                                    <?php echo html_escape($to_date); ?></b></td>
                        </tr>
                    </table>
                    <table width="100%" class="table_boxnew table-bordered" cellpadding="0" cellspacing="0">
                        <tr class="table_head">
                            <td width="73%" height="29" align="center" class="cashflowparticular">
                                <b><?php echo display('particulars');?></b>
                            </td>

                            <td width="30%" align="right" class="cashflowamount"><b><?php echo display('amount');?></b>
                            </td>
                        </tr>
                        <?php 
                          $fullassets=0;
                          foreach($fixed_assets as $assets){
                          $total_assets = 0;
                          $head_data = $this->accounts_model->assets_info($assets['HeadName']);


                          ?>
                        <tr>
                            <td align="left"
                                class="paddingleft10px <?php if($assets['HeadName'] =='Current Asset' || $assets['HeadName'] =='Non Current Assets'){echo 'balancesheet_head';}?>">
                                <?php echo html_escape($assets['HeadName']); ?></td>

                            <td align="right" class="cashflowamnt">

                            </td>
                        </tr>
                        <?php
                          foreach($head_data as $assets_head){
                              
                          $ass_balance = $this->accounts_model->assets_balance($assets_head['HeadCode'],$from_date,$to_date);?>
                        <?php if($assets_head['PHeadName'] == 'Current Asset'){
                          $child_head_current = $this->accounts_model->asset_childs($assets_head['HeadName'],$from_date,$to_date);
                        ?>
                        <tr>
                            <td align="left" class="paddingleft10px"><?php echo html_escape($assets_head['HeadName']); ?></td>

                            <td align="right" class="cashflowamnt">

                            </td>
                        </tr>
                        <?php foreach($child_head_current as $cchead){
                          $cur_ass_balance = $this->accounts_model->assets_balance($cchead['HeadCode'],$from_date,$to_date);
                          $schild_head_current = $this->accounts_model->asset_childs($cchead['HeadName'],$from_date,$to_date);
                        ?>
                        <?php if($cur_ass_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><span class="pl-2"><?php echo html_escape($cchead['HeadName']); ?></span></td>

                            <td align="right" class="cashflowamnt">
                                <?php echo html_escape($cur_ass_balance[0]['balance']);
                                  $total_assets += $cur_ass_balance[0]['balance'];
                                ?>
                            </td>
                        </tr>
                        <?php }?>

                        <?php if($cchead['HeadName'] == 'Cash At Bank' || $cchead['HeadName'] == 'Account Receivable' || $cchead['HeadName'] == 'Customer Receivable' || $cchead['HeadName'] == 'Loan Receivable' || $cchead['HeadName'] == 'Online Payment' || $cchead['HeadName'] == 'Advance' || $cchead['HeadName'] == 'Prepayment'){
                            foreach($schild_head_current as $scchild){
                            $cur_bank_balance = $this->accounts_model->assets_balance($scchild['HeadCode'],$from_date,$to_date);
                        ?>
                        <?php if($cur_bank_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><span class="pl-2"><?php echo html_escape($scchild['HeadName']); ?></span></td>

                            <td align="right" class="cashflowamnt">
                                <?php echo html_escape($cur_bank_balance[0]['balance']);
                                  $total_assets += $cur_bank_balance[0]['balance'];
                                ?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php }}?>
                        <?php } //current assets first child?>
                        <?php } //end current asset?>

                        <?php if($assets_head['PHeadName'] == 'Non Current Assets'){?>
                        <?php
                          if($assets_head['IsTransaction']==1){
                            $noncur_ass_balance = $this->accounts_model->assets_balance($assets_head['HeadCode'],$from_date,$to_date);
                            if($noncur_ass_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><span class="pl-2"><?php echo html_escape($assets_head['HeadName']); ?></span></td>

                            <td align="right" class="cashflowamnt">
                                <?php echo html_escape($noncur_ass_balance[0]['balance']);
                                          $total_assets += $noncur_ass_balance[0]['balance'];
                                        ?>
                            </td>
                        </tr>
                        <?php }
                          } ?>
                        <?php if($assets_head['IsGL']==1){
                            $child_head_current = $this->accounts_model->asset_childs($assets_head['HeadName'],$from_date,$to_date);
                           ?>

                        <tr>
                            <td align="left" class="paddingleft10px"><?php echo html_escape($assets_head['HeadName']); ?></td>

                            <td align="right" class="cashflowamnt">

                            </td>
                        </tr>
                        <?php 
                            foreach($child_head_current as $cchead){
                                $cur_ass_balance = $this->accounts_model->assets_balance($cchead['HeadCode'],$from_date,$to_date);
                              ?>
                        <?php if($cchead['IsTransaction']==1){
                                if($cur_ass_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><span class="pl-2"><?php echo html_escape($cchead['HeadName']); ?></span></td>

                            <td align="right" class="cashflowamnt">
                                <?php echo html_escape($cur_ass_balance[0]['balance']);
                                        $total_assets += $cur_ass_balance[0]['balance'];
                                      ?>
                            </td>
                        </tr>
                        <?php } }
                        ?>
                        <?php } } //non current first child ?>
                        <?php } //non current asset end?>

                        <?php } //end of assets?>

                        <tr>
                            <td class="text-right bsp_10"><b><?php echo display('total')?>
                                    <?php echo html_escape($assets['HeadName']); ?></b></td>

                            <td align="right" class="cashflowamnt bsb_2px">
                                <b><?php echo number_format($total_assets,2);?></b>
                            </td>
                        </tr>
                        <?php 
                          $fullassets=$fullassets+$total_assets;
                        }?>
                        <tr>
                            <td class="text-right bsp_10"><b><?php echo display('total')?>
                                    <?php echo display("asset"); ?></b></td>

                            <td align="right" class="cashflowamnt bsb_2px">
                                <b><?php echo number_format($fullassets,2);?></b>
                            </td>
                        </tr>
                        <?php 
                          $totalliabilities=0;
                          foreach($liabilities as $liability){
                          $total_liab = 0;
                          $liab_head_data = $this->accounts_model->liabilities_info($liability['HeadName']);
                        ?>
                        <tr>
                            <td align="left"
                                class="paddingleft10px <?php if($liability['HeadName'] =='Current Liabilities' || $liability['HeadName'] =='Non Current Liabilities'){echo 'balancesheet_head';}?>">
                                <?php echo html_escape($liability['HeadName']); ?></td>

                            <td align="right" class="cashflowamnt">

                            </td>
                        </tr>
                        <?php
 
                          foreach($liab_head_data as $liab_head){
                              $child_liability = $this->accounts_model->liabilities_info($liab_head['HeadName']);
                          ?>
                        <?php
                          if($liab_head['IsTransaction']==1){
                            $liab_balance = $this->accounts_model->liabilities_balance($liab_head['HeadCode'],$from_date,$to_date);
                            if($liab_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><?php echo html_escape($liab_head['HeadName']); ?></td>

                            <td align="right" class="cashflowamnt">
                                <?php echo html_escape($liab_balance[0]['balance']);
                                          $total_liab += $liab_balance[0]['balance'];
                                        ?>
                            </td>
                        </tr>
                        <?php }
                          } ?>
                        <?php  if($liab_head['IsGL']==1){ ?>
                        <tr>
                            <td align="left" class="paddingleft10px"><?php echo html_escape($liab_head['HeadName']); ?></td>

                            <td align="right" class="cashflowamnt">
                                <?php 
                                  $total_liab +=0;
                                ?>
                            </td>
                        </tr>
                        <?php }?>

                        <?php
 
                          foreach($child_liability as $chliab_head){
                          $liab_balance = $this->accounts_model->liabilities_balance($chliab_head['HeadCode'],$from_date,$to_date);
                          $schild_liability = $this->accounts_model->liabilities_info($chliab_head['HeadName']);

                        ?>
                        <?php if($liab_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><span class="pl-2"><?php echo html_escape($chliab_head['HeadName']); ?></span></td>

                            <td align="right" class="cashflowamnt">
                                <?php 
                                  echo  html_escape($liab_balance[0]['balance']);
                                  $total_liab += $liab_balance[0]['balance'];
                                ?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php foreach($schild_liability as $schliab_head){
                          $sliab_balance = $this->accounts_model->liabilities_balance($schliab_head['HeadCode'],$from_date,$to_date);

                        ?>
                        <?php if($sliab_balance[0]['balance'] <> 0){?>
                        <tr>
                            <td align="left" class="paddingleft10px"><span class="pl-2"><?php echo html_escape($schliab_head['HeadName']); ?></span></td>

                            <td align="right" class="cashflowamnt">
                                <?php 
                                  echo  html_escape($sliab_balance[0]['balance']);
                                  $total_liab += $sliab_balance[0]['balance'];
                                ?>
                            </td>
                        </tr>
                        <?php }?>

                        <?php }?>

                        <?php }?>
                        <?php } ?>
                        <tr>
                            <td class="paddingleft10px text-right bsp_10">
                                <b><?php echo display('total')?> <?php echo html_escape($liability['HeadName']); ?></b>
                            </td>

                            <td align="right" class="cashflowamnt bsb_2px">
                                <b><?php echo number_format($total_liab,2);?></b>
                            </td>
                        </tr>
                        <?php 
                          $totalliabilities=$totalliabilities+$total_liab;}
                        ?>
                        <?php
                        $net_profit = $this->accounts_model->net_income($from_date,$to_date);
                        $totalliabilities += $net_profit;
                        ?>
                        <?php if($net_profit>0){ ?>
                        <tr>
                            <td class="paddingleft10px text-right bsp_10">
                                <b><?php echo display("net_profit"); ?></b>
                            </td>

                            <td align="right" class="cashflowamnt bsb_2px">
                                <b><?php echo number_format($net_profit,2);?></b>
                            </td>
                        </tr>
                        <?php }else{ ?>
                        <tr>
                            <td class="paddingleft10px text-right bsp_10">
                                <b><?php echo display("net_loss"); ?></b>
                            </td>

                            <td align="right" class="cashflowamnt bsb_2px">
                                <b><?php echo number_format($net_profit,2);?></b>
                            </td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td class="paddingleft10px text-right bsp_10">
                                <b><?php echo display('total')?> <?php echo display("liability"); ?></b>
                            </td>

                            <td align="right" class="cashflowamnt bsb_2px">
                                <b><?php echo number_format($totalliabilities,2);?></b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>