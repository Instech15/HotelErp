<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
         <div class="card-header">
                        <h4><?php echo display('position_list_detail') ?></h4>
                </div>
            
           <div class="card-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('position_name') ?></th>
                            <th><?php echo display('position_details') ?></th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($position)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($position as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->position_name); ?></td>
                                    <td><?php echo html_escape($que->position_details); ?></td>
                                   
                                    <td class="center">
                                    <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/position-update/".html_escape($que->pos_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
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
 
 