<div class="row">
    <div class="col-sm-12 col-md-12">
         <div class="card">
                    <div class="card-header">
                    <h4>
                     <?php echo display('journal_voucher')?>
                    </h4>
            </div>
           <div class="card-body">

                        <?php echo form_open_multipart('accounts/accounts/create_journal_voucher') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label">Voucher No</label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no->voucher)){
                               $vn = substr($voucher_no->voucher,8)+1;
                              echo $voucher_n = 'Journal-'.$vn;
                             }else{
                               echo $voucher_n = 'Journal-1';
                             } ?>" class="form-control" readonly>
                        </div>
                    </div> 
                    
                     <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-4">
                             <input type="text" name="dtpDate" class="form-control datepickers" value="<?php echo  date('Y-m-d')?>">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label">Remark</label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                        </div>
                    </div> 
                       <div class="table-responsive mt_10px">
                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 
                                <thead>
                                    <tr>
                                        <th class="text-center">Account Name</th>
                                         <th class="text-center">Code</th>
                                          <th class="text-center">Debit</th>
                                          <th class="text-center">Credit</th>
                                          <th class="text-center">Action</th>  
                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                   
                                    <tr>
                                        <td class="form-group">  
       <select name="cmbCode[]" id="cmbCode_1" class="form-control basic-single" data-live-search="true" onchange="load_code(this.value,1)">
         <?php foreach ($acc as $acc1) {?>
   <option value="<?php echo html_escape($acc1->HeadCode);?>"><?php echo html_escape($acc1->HeadName);?></option>
         <?php }?>
       </select>

                                         </td>
                                        <td><input type="text" name="txtCode[]"  class="form-control "  id="txtCode_1" required></td>
                                        <td><input type="text" name="txtAmount[]" value="0" class="form-control total_price"  id="txtAmount_1" onkeyup="calculation(1)" required>
                                           </td>
                                            <td ><input type="text" name="txtAmountcr[]" value="0" class="form-control total_price1"  id="txtAmount1_1" onkeyup="calculation(1)" required>
                                           </td>
                                       <td>
                                                <button class="btn btn-danger red t_right" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)"><i class="ti-trash"></i></button>
                                            </td>
                                    </tr>                              
                              
                                </tbody>                               
                             <tfoot>
                                    <tr>
                                      <td >
                                            <input type="button" id="add_more" class="btn btn-info" name="add_more"  onClick="addaccount('debitvoucher');" value="<?php echo display('add_more') ?>" />
                                        </td>
                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                           </td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" readonly="readonly" value="0"/>
                                        </td>
                                         <td class="text-right">
                                            <input type="text" id="grandTotal1" class="form-control text-right " name="grand_total1" readonly="readonly" value="0"/>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
            </div>  
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>
<div id="cntra" hidden>
<?php foreach ($acc as $acc2) {?><option value='<?php echo html_escape($acc2->HeadCode);?>'><?php echo html_escape($acc2->HeadName);?></option><?php }?>
</div>
<?php $checkModule = $this->db->where('directory', 'day_closing')->where('status', 1)->get('module')->num_rows(); if ($checkModule == 1) { ?>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/dayClosing.js"></script>
<?php } ?>