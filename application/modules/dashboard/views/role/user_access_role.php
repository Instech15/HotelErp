
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
                    <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="w-100 datatable table-bordered table-striped table-hover" id="exdatatable">

                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('username') ?></th>
                                <th><?php echo display('role_name') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($user_access_role)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($user_access_role as $value) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo html_escape($value->firstname); ?> <?php echo html_escape($value->lastname); ?></td>
                                <td><?php echo html_escape($value->role_name); ?></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="useraccessrole('<?php echo html_escape($value->role_acc_id); ?>')" class="btn btn-info btn-sm custom_btn" data-toggle="tooltip" data-placement="left" title="Update"  ><i class="ti-pencil-alt" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm custom_btn" onclick="roleassigndelete('<?php echo html_escape($value->role_acc_id); ?>')" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table> 
                  </div>


            </div>
        </div>
    </div>
</div>



 