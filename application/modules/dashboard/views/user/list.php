<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
           <div class="card-header">
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            </div>
            <div class="card-body table-responsive">
                     <table id="exdatatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('image') ?></th>
                                <th><?php echo display('username') ?></th>
                                <th><?php echo display('email') ?></th>
                                <th><?php echo display('about') ?></th>
                                <th><?php echo display('last_login') ?></th>
                                <th><?php echo display('last_logout') ?></th>
                                <th><?php echo display('ip_address') ?></th>
                                <th><?php echo display('status') ?></th>
                                <th><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($user)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($user as $value) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><img src="<?php echo html_escape(base_url(!empty($value->image)?html_escape($value->image):'assets/img/user/user.png')); ?>" alt="Image" height="54" class="width_60px" ></td>
                                <td><?php echo html_escape($value->fullname); ?></td>
                                <td><?php echo html_escape($value->email); ?></td>
                                <td><?php echo character_limiter($value->about, 20); ?></td>
                                <td><?php echo html_escape($value->last_login); ?></td>
                                <td><?php echo html_escape($value->last_logout); ?></td>
                                <td><?php echo html_escape($value->ip_address); ?></td>
                                <td><?php echo ((html_escape($value->status)==1)?display('active'):display('inactive')); ?></td>
                                <td>
                                    <?php if ($value->is_admin == 0) { ?>
                                    <a href="<?php echo base_url("edit-user/".html_escape($value->id)) ?>" class="btn btn-info m-b-5" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url("delete-user/".html_escape($value->id)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger m-b-5" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash" aria-hidden="true"></i></a>
                                    <?php } else { ?> 
                                    <button class="btn btn-info m-b-5" title="<?php echo display('admin') ?>"><?php echo display('admin') ?></button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
            </div> 
        </div>
    </div>
</div>

 