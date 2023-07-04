<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

         <div class="card">
<div class="card-header"><h4><?php echo display('holiday_view') ?></h4></div> 
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('holiday_name') ?></th>
                            <th><?php echo display('start_date') ?></th>
                            <th><?php echo display('end_date') ?></th>
                            <th><?php echo display('no_of_days') ?></th>
                          
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($holiday)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($holiday as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->holiday_name); ?></td>
                                    <td><?php echo html_escape($que->start_date); ?></td>
                                    <td><?php echo html_escape($que->end_date); ?></td>
                                    <td><?php echo html_escape($que->no_of_days); ?></td>
                                    
                                   
                                    <td class="center">
                                    <?php if($this->permission->method('hrm','update')->access()): ?>
                                        <a href="<?php echo html_escape(base_url("hrm/holiday-update/$que->payrl_holi_id")) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                        <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?>  
                                        <a href="<?php echo html_escape(base_url("hrm/holiday-delete/$que->payrl_holi_id")) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a>
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
</div>