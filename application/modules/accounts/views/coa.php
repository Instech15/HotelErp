<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo display('voucher_report')?>
                </h4>
            </div>
            <div class="card-body">
                <div class="row" id="">
                    <div class="col-sm-6 mt-4">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('date') ?>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="sales_date" value="<?php echo date('Y-m-d')?>"
                                    placeholder="<?php echo display('date') ?>"
                                    class="datepickers form-control serach_date">
                            </div>
                            <label for="date" class="col-sm-4 col-form-label">
                            </label>
                            <div class="col-sm-6 text-right mt-2">
                            <button type="submit" class="btn btn-success w-md m-b-5"
                                id="btnSerach"><?php echo display('find') ?></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable2 table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('voucher_no') ?></th>
                                <th><?php echo display('remarks') ?></th>
                                <th><?php echo display('amount') ?></th>
                                <th><?php echo display('date') ?></th>
                            </tr>
                        </thead>
                        <tbody id="show_vouchar">
                            <?php
                     $date=date('Y-m-d');
                     ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url("accounts/accounts/vouchar_cash/".$date) ?>">
                                        <?php echo "CV-BAC-".$date;?>
                                    </a>
                                </td>
                                <td>Aggregated Cash Credit Voucher of <?php echo html_escape($date);?></td>
                                <td><?php if($get_cash->Amount==''){
                                           echo '0.00';
                                      }else{
                                          echo html_escape($get_cash->Amount);
                                      } ?></td>
                                <td><?php  echo html_escape($date); ?></td>
                            </tr>
                            <?php
                          foreach($get_vouchar as $v_data){

                              ?>
                            <tr>
                                <td><a
                                        href="<?php echo base_url("accounts/accounts/vouchar_cash/".html_escape($v_data->VNo)) ?>"><?php echo html_escape($v_data->VNo);?></a>
                                </td>
                                <td><?php echo html_escape(!empty($v_data->Narration)?$v_data->Narration:Null);?></td>
                                <?php if($v_data->IsAppove==1){ ?>
                                <td><?php echo number_format($v_data->Amount); ?></td>
                                <?php }else{ ?>
                                <td><?php echo "Voucher Inactive"; ?></td>
                                <?php } ?>
                                <td><?php echo html_escape($v_data->VDate);?></td>
                            </tr>
                            <?php
                          }
                          ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/coa.js"></script>