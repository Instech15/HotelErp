
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?php echo display('wacall_add') ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo form_open('customer/customer_info/create_wakeup_call') ?>
                                    <div class="form-group row">
                                        <label for="cust_name" class="col-sm-4 col-form-label"><?php echo display('cust_name') ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-8 mb-2">
                                            <?php echo form_dropdown('cust_name', $employeename, null, 'class="form-control basic-single" id="cust_name" required') ?>
                                    </div>

                                    <label for="wakeupcall_time" class="col-sm-4 col-form-label"><?php echo display('wakeup_time') ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-8 mb-2">
                                            <input type="text" name="wakeupcall_time" class="form-control datetimepickers" placeholder="<?php echo display('wakeup_time') ?>">
                                    </div>
                                    <label for="remarks" class="col-sm-4 col-form-label"><?php echo display('remarks') ?> </label>
                                    <div class="col-sm-8 mb-2">
                                    <textarea  name="remarks" id="remarks" placeholder="<?php echo display('remarks') ?>" class="form-control"></textarea>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-danger w-md m-b-5" data-dismiss="modal"><?php echo display('cancel') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                                    </div>
                                    
                                    <?php echo form_close() ?>

                                </div>
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

        <div class="card">
            <div class="card-header">
            <?php if ($this->permission->method('customer', 'create')->access()) : ?>
             <h4><?php echo display('wakeup_call_list') ?><small class="float-right">
             <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal">
                         <i class="ti-plus" aria-hidden="true"></i>
                         <?php echo display('wacall_add') ?></button></small></h4>
                         <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th>
                                <th><?php echo display('cust_name') ?></th>
                                <th><?php echo display('date') ?></th>
                                <th><?php echo display('remarks') ?></th>
                                <th><?php echo display('action') ?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($call_list)) { ?>
                                <?php $sl = 1;$nf=0;?>
                                <?php foreach ($call_list as $row) { ?>
                                    <tr class="">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($row->customer_name); ?></td>
                                        <td id="wacadata"><?php echo html_escape($row->wakeupcall_time); ?></td>
                                        <?php
                                        if($row->wakeupcall_time>date('Y-m-d H:m')){$nf++;} ?>
                                        <td><?php echo html_escape($row->remarks); ?></td>
                                       
                                        <td class="center">

                                            <?php if ($this->permission->method('customer', 'update')->access()) : ?>
                                                <input name="url" type="hidden" id="url_<?php echo html_escape($row->wapupid); ?>" value="<?php echo base_url("customer/wakeupcall-update") ?>" />
                                                <a onclick="editinfo('<?php echo html_escape($row->wapupid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a> 


                                            <?php endif; ?>

                                            <?php if ($this->permission->method('customer', 'delete')->access()) : ?>
                                                <a href="<?php echo html_escape(base_url("customer/wakeupcall-delete/" . $row->wapupid)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        
                                    </tr>
                                    <?php $sl++; ?>
                                <?php }; ?>
                            <?php } ?>
                        </tbody>
                    </table>

                      </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="nfcheck" value="<?php echo html_escape((!empty($nf)?$nf:'')); ?>">