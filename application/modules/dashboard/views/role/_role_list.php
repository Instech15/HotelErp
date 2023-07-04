
 <div class="row">
    <div class="col-sm-12 col-md-12">
            <div class="card">
                    <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            <div class="card-body">
 
                    <table id="exdatatable" class="datatable table table-striped table-sm" >
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('role_name') ?></th>
                                <th><?php echo display('description') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($role_list)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($role_list as $value) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo html_escape($value->role_name); ?></td>
                                <td><?php echo html_escape($value->role_description); ?></td>
                                <td>
                                    <a href="<?php echo base_url("update-role-assign/".html_escape($value->role_id)) ?>"  data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" onclick="roledelete('<?php echo html_escape($value->role_id); ?>')" class="btn btn-danger btn-sm custom_btn" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa ti-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>





 