<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('currency_add');?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
           
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
               
                <div class="card-body">

                <?php echo form_open('units/currency/create') ?>
                    <?php echo form_hidden('currencyid', (!empty($intinfo->currencyid)?$intinfo->currencyid:null)) ?>
                        <div class="form-group row">
                      <label for="currencyname" class="col-sm-4 col-form-label"><?php echo display('currency_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                          <input name="currencyname" class="form-control" type="text" placeholder="Add <?php echo display('currency_name') ?>" id="currencyname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                       <label for="icon" class="col-sm-4 col-form-label"><?php echo display('currency_icon') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                        <input name="icon" class="form-control" type="text" placeholder="Add <?php echo display('currency_icon') ?>" id="icon" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-sm-4 col-form-label"><?php echo display('currency_rate') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="rate" class="form-control" type="text" placeholder="Add <?php echo display('currency_rate') ?>" id="rate" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-4 col-form-label"><?php echo display('position') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8 customesl">
                                 <select name="position" class="form-control">
                                <option value=""  selected="selected"><?php echo display('select_option') ?></option>
                                <option value="1"><?php echo display('left') ?></option>
                                <option value="2"><?php echo display('right') ?></option>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('currency_edit');?></strong>
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

        <div class="card"> 
				<div class="card-header"><h4><?php echo display('currency_list')?> <small class="float-right"><?php if($this->permission->method('units','create')->access()): ?>
<button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="ti-plus-circle" aria-hidden="true"></i>
<?php echo display('currency_add')?></button> 
<?php endif; ?></small></h4></div>
            <div class="card-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl') ?></th>
                            <th><?php echo display('currency_name') ?></th>
                            <th><?php echo display('currency_icon') ?></th>
                            <th><?php echo display('position') ?></th>
                            <th><?php echo display('currency_rate') ?></th>
                            <th><?php echo display('action') ?></th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($currencylist)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($currencylist as $currency) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($currency->currencyname); ?></td>
                                    <td><?php echo html_escape($currency->curr_icon); ?></td>
                                    <td><?php if($currency->position==1){ echo "Left";} else{ echo "Right";} ?></td>
                                    <td><?php echo html_escape($currency->curr_rate); ?></td>
                                   <td class="center">
                                    <?php if($this->permission->method('units','update')->access()): ?>
                                    <input name="url" type="hidden" id="url_<?php echo html_escape($currency->currencyid); ?>" value="<?php echo base_url("units/currency/updateintfrm") ?>" />
                                        <a onclick="editinfo('<?php echo html_escape($currency->currencyid); ?>')" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a> 
                                         <?php endif; 
										 if($this->permission->method('units','delete')->access()): ?>
                                        <a href="<?php echo base_url("units/currency/delete/".html_escape($currency->currencyid)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash" aria-hidden="true"></i></a> 
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

     
