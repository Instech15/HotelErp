<?php
    $total=0;

   ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card" id="printArea">
            <div class="card-body">
                <table class="datatable table-bordered table-striped table-hover" width="100%">

                    <div class="card-header">
                        <h4>
                            <?php echo display('loan_report')?>
                            <small class="float-right">
                                <input type="button" class="btn btn-info text-white button-print" name="btnPrint"
                                    id="btnPrint" value="Print" onclick="printContent('printArea')" />
                            </small>
                        </h4>
                    </div>
                    <div class="row">
                        <span class="form-group text-center col-sm-5">
                            <?php
        echo img($emp->picture );?>
                        </span>
                        <div class="col-sm-7">
                            <div class="form-group text-left c_f_size_f_wight_family">
                                <?php echo display('name');?>:<?php
        echo html_escape($emp->first_name)." ".html_escape($emp->last_name) ;?>
                            </div>

                            <div class="form-group text-left c_f_size_wight_family">

                                ID NO: <?php
    
echo html_escape($emp->employee_id) ;
         
        ?>
                            </div>
                            <div class="form-group text-left c_f_size_wight_family">

                                <?php echo display('designation');?>: <?php
         echo html_escape($emp->position_name) ;
         
        ?>
                            </div>
                        </div>
                    </div>

                </table>
                <table class="table table-striped" width="100%">
                    <tr>
                        <th><?php echo display('sl');?></th>
                        <th><?php echo display('loan_issue_id');?></th>
                        <th><?php echo display('date');?></th>
                        <th><?php echo display('amount');?></th>
                        <th><?php echo display('repayment_amount');?></th>
                        <th><?php echo display('installment');?></th>
                    </tr>
                    <?php
    $x=1;
    foreach($ab as $qr){?>
                    <tr>
                        <td><?php echo $x++;?></td>
                        <td><a
                                href="<?php echo html_escape(base_url("hrm/Loan/details_view/hrm/Loan/details_view/$qr->loan_id"));?>"><?php echo html_escape($qr->loan_id)?></a>
                        </td>
                        <td><?php echo html_escape($qr->date_of_approve)?></td>
                        <td><?php echo html_escape($qr->amount)?>$</td>
                        <td><?php echo html_escape($qr->repayment_amount) ?>$</td>
                        <td><?php echo html_escape($qr->installment) ?>$</td>
                    </tr>
                    <?php }?>

                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/lnReport.js"></script>