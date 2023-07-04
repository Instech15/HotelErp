<script src="<?php echo MOD_URL.$module;?>/assets/js/prechaseReport.js"></script>
<link type="text/css" href="<?php echo MOD_URL.$module;?>/assets/css/table.css">

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4><?php echo display('report') ?></h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <?php echo form_open('report/index',array('class' => 'form-inline'))?>
                        <?php
                        $today = date('d-m-Y'); ?>
                        <div class="form-group">
                            <label class="padding_right_5px" for="from_date"><?php echo display('start_date') ?>
                            </label>
                            <input type="text" name="from_date" value="<?php echo date('Y-m-d')?>"
                                class="form-control datepickers" id="from_date"
                                placeholder="<?php echo display('start_date') ?>">
                        </div>

                        <div class="form-group">
                            <label class="padding_0_5px" for="to_date"> <?php echo display('end_date') ?> </label>
                            <input type="text" name="to_date" value="<?php echo date('Y-m-d')?>"
                                class="form-control datepickers" id="to_date" placeholder="<?php echo display('end_date') ?>">
                        </div>
                        &nbsp;<a class="btn btn-success" onclick="getreport()"><span class="text-white">
                                <?php echo display('search') ?></span></a>&nbsp;
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="row" id="printArea">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4><?php echo display('purchase_report') ?>
                            <small class="float-right">
                                <input type="button" class="button-print btn btn-info text-white button-print" name="btnPrint"
                                    id="btnPrint" value="Print" onclick="printContent('printArea')" />
                            </small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="text-center" id="getresult2">
                                <div class="table-responsive">
                                <table id="" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('date') ?></th>
                                            <th><?php echo display('invoice_no') ?></th>
                                            <th><?php echo display('supplier_name') ?></th>
                                            <th><?php echo display('amount') ?></th>
                                            <th><?php echo display('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
									$totalprice=0;
									if($preport) { 
									foreach($preport as $pitem){
										$totalprice=$totalprice+$pitem->total_price;
									?>
                                        <tr>
                                            <td><?php $originalDate = $pitem->purchasedate;
									echo $newDate = date("d-M-Y", strtotime($originalDate));
									 ?></td>
                                            <td>
                                                <?php echo html_escape($pitem->invoiceid);?>
                                            </td>
                                            <td><?php echo html_escape($pitem->supName);?></td>
                                            <td class="text_align_right">
                                                <?php if($currency->position==1){echo html_escape($currency->curr_icon);}?>
                                                <?php echo html_escape($pitem->total_price);?>
                                                <?php if($currency->position==2){echo html_escape($currency->curr_icon);}?></td>
                                            <td><?php echo html_escape($pitem->supName);?></td>
                                        </tr>
                                        <?php } 
									}
									?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right" class="text_align_f_14px">&nbsp;
                                                <b><?php echo display('total_purchase') ?> </b>
                                            </td>
                                            <td class="text_align_right">
                                                <b><?php if($currency->position==1){echo html_escape($currency->curr_icon);}?>
                                                    <?php echo html_escape($totalprice);?>
                                                    <?php if($currency->position==2){echo html_escape($currency->curr_icon);}?></b>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            </div>
                        </div>
                        <div class="text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>