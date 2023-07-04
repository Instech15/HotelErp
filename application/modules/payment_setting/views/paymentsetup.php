 <div class="card"> 
 <?php if($this->permission->method('payment_setting','create')->access()): ?>

 <div class="card-header">
 <h4><?php echo display('paymentmethod_setup') ?></h4>
            </div>
<?php endif; ?>

<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('add_paymentsetup');?></strong>
            </div>
            <div class="modal-body">
           
<div class="row">
        <div class="col-sm-12 col-md-12">
               
                <div class="card-body">
                <?php echo form_open('payment_setting/paymentmethod/psetupcreate') ?>
                    <?php echo form_hidden('setupid', (!empty($intinfo->setupid)?$intinfo->setupid:null)) ?>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('payment_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8 customesl">
                                <?php if(empty($paymentlist)){$paymentlist = array('' => '--Select--');}
						echo form_dropdown('payment',$paymentlist,(!empty($intinfo->paymentid)?$intinfo->paymentid:null),'class="form-control" id="payment" required') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('marchantid') ?></label>
                            <div class="col-sm-8">
                                 <input name="marchantid" class="form-control" type="text" placeholder="<?php echo display('marchantid') ?>" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('password') ?></label>
                            <div class="col-sm-8">
                                 <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('email') ?></label>
                            <div class="col-sm-8">
                                 <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-4 col-form-label"><?php echo display('currency') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8 customesl">
                                <?php if(empty($currency_list)){$currency_list = array('' => '--Select--');}
						echo form_dropdown('currency',$currency_list,(!empty($intinfo->currency)?$intinfo->currency:null),'class="form-control" id="currency" ') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="islive" class="col-sm-4 col-form-label"><?php echo display('is_live_or_test') ?></label>
                        <div class="col-sm-8 customesl">
                            <select name="islive" class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1"><?php echo display('live') ?></option>
                                <option value="0"><?php echo display('test_mode') ?></option>
                              </select>
                        </div>
                    </div>
						<div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-8 customesl">
                            <select name="status" class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1"><?php echo display('active') ?></option>
                                <option value="0"><?php echo display('inactive') ?></option>
                              </select>
                        </div>
                    </div>
  
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
        </div>
    </div>
             
    
   
    </div>
     
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>

<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('update');?></strong>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body editinfo">
            
    		</div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('payment_name') ?></th>
                            <th><?php echo display('email') ?></th>
                            <th><?php echo display('marchantid') ?></th>
                            <th><?php echo display('currency') ?></th>
                            <th><?php echo display("payment_mode"); ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($psetuplist)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($psetuplist as $payment) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($payment->payment_method); ?></td>
                                    <td><?php echo html_escape($payment->email); ?></td>
                                    <td><?php echo html_escape($payment->marchantid); ?></td>
                                    <td><?php echo html_escape($payment->currency); ?></td>
                                    <td><?php if($payment->Islive==1){echo display('live_mode');}else{echo display('test_mode');} ?></td>
                                    <td><?php if($payment->status==1){echo DISPLAY('active');}else{echo display('inactive');} ?></td>
                                   <td class="center">
                                    <?php if($this->permission->method('payment_setting','update')->access()): ?>
                                    <input name="url" type="hidden" id="url_<?php echo html_escape($payment->setupid); ?>" value="<?php echo base_url("payment_setting/paymentmethod/psetupupdateintfrm") ?>" />
                                        <a onclick="editinfo('<?php echo html_escape($payment->setupid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a> 
                                         <?php endif;  ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>

     
