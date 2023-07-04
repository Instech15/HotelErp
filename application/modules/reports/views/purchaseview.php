<link type="text/css" href="<?php echo MOD_URL.$module;?>/assets/css/table.css">
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="card">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-bd lobidrag">
                <div class="card-header">
                    <h4><?php echo display('stock_report') ?>
                        
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body" id="printArea">
            <div class="table-responsive">      
            <table id="exdatatable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th><?php echo display('ingredient_name') ?></th>
                        <th><?php echo display("qty"); ?> </th>
                        <th><?php echo display('price') ?> </th>
                        <th><?php echo display('total') ?> </th>

                    </tr>
                </thead>
                <tbody id="addinvoiceItem">
                    <?php 
                                    $sl=1;
									$grandpr=0;
                                    foreach ($stockreport as $report) {
										$grandpr=($report->sumprice*$report->qty)+$grandpr;
										?>


                    <tr>
                        <td><?php echo  html_escape($report->product_name); ?></td>
                        <td><?php echo   html_escape($report->qty." ".$report->uom_short_code); ?></td>
                        <td> <?php echo  html_escape($report->sumprice);?> </td>
                        <td> <?php echo  html_escape($report->sumprice*$report->qty);?> </td>

                    </tr>
                    <?php $sl++; } 
                                 ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" align="right"><b><?php echo display('grand_total') ?>:</b></td>
                        <td><?php if($currency->position==1){echo html_escape($currency->curr_icon);}?><?php echo number_format($grandpr,2);?><?php if($currency->position==2){echo html_escape($currency->curr_icon);}?>
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