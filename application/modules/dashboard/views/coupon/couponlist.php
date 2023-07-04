<div class="form-group text-right">
 <?php if($this->permission->method('dashboard','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
<?php echo display('add_coupon')?></button> 
<?php endif; ?>

</div>
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('add_coupon');?></strong>
            </div>
            <div class="modal-body">
           
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">

                <?php echo form_open_multipart('dashboard/couponlist/create') ?>
                    <?php echo form_hidden('tokenid', (!empty($intinfo->tokenid)?$intinfo->tableid:null)) ?>
                        <div class="form-group row">
                            <label for="tokencode" class="col-sm-4 col-form-label"><?php echo display('coupon_Code')?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                <input name="tokencode" class="form-control" type="text" placeholder="<?php echo display('coupon_Code') ?>" id="tokencode" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tokenrate" class="col-sm-4 col-form-label"><?php echo  display('coupon_rate'); ?></label>
                            <div class="col-sm-8">
                                <input name="tokenrate" class="form-control" type="text" placeholder="<?php echo  display('coupon_rate'); ?>" id="capacity" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="offerstartdate" class="col-sm-4 col-form-label"><?php echo  display('coupon_startdate'); ?></label>
                        <div class="col-sm-8">
                            <input name="offerstartdate" class="form-control datepickers" type="text"  placeholder="<?php echo  display('coupon_startdate'); ?>" id="offerstartdate"  value="" required>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label for="offerendate" class="col-sm-4 col-form-label"><?php echo  display('coupon_enddate'); ?> </label>
                        <div class="col-sm-8">
                            <input name="offerendate" class="form-control datepickers" type="text"  placeholder="<?php echo  display('coupon_enddate'); ?>" id="offerendate"  value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-8 customesl">
                            <select name="status"  class="form-control">
                                <option value=""><?php echo display('select_option') ?></option>
                                <option value="1" selected="selected"><?php echo display('active') ?></option>
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
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>

<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('coupon_edit');?></strong>
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

        <div class="card card-default thumbnail"> 

            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('coupon_Code') ?></th>
                            <th><?php echo display('coupon_rate') ?></th>
                            <th><?php echo display('coupon_startdate') ?></th>
                            <th><?php echo display('coupon_enddate') ?></th>
                            <th><?php echo display('action') ?></th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($couponlist)) { 
						
						?>
                            <?php $sl =  $pagenum+1; ?>
                            <?php foreach ($couponlist as $token) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($token->tokencode); ?></td>
                                    <td><?php echo html_escape($token->tokenrate); ?></td>
                                    <td><?php echo html_escape($token->tokenstartdate); ?></td>
                                    <td><?php echo html_escape($token->tokenendate); ?></td>
                                    <td class="center">
                                    <?php if($this->permission->method('dashboard','update')->access()): ?>
                                    <input name="url" type="hidden" id="url_<?php echo html_escape($token->tokenid); ?>" value="<?php echo base_url("dashboard/couponlist/updateintfrm") ?>" />
                                        <a onclick="editinfo('<?php echo html_escape($token->tokenid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                         <?php endif; 
										 if($this->permission->method('setting','delete')->access()): ?>
                                        <a href="<?php echo base_url("dashboard/couponlist/delete/".html_escape($token->tokenid)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                         <?php endif; ?>
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

     
