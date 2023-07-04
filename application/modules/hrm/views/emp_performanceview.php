<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
         <div class="card-header"><h4><?php echo display('emp_performance') ?></h4></div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                                    <th><?php echo display('Sl') ?></th>
                                    <th><?php echo display('employee_name') ?></th>
                                    <th><?php echo display('employee_id') ?></th>
                                    <th><?php echo display('note') ?></th>
                                    <th><?php echo display('date') ?></th>
                                    <th><?php echo display('note_by') ?></th>
                                    <th><?php echo display('number_of_star') ?></th>
                                    <th><?php echo display('status') ?></th>
                                    <th><?php echo display('updated_by') ?></th>
                                    <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_perform)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($emp_perform as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                        <td><?php echo $sl; ?></td><td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                                        <td><?php echo html_escape($que->employee_id); ?></td>
                                        <td><?php echo html_escape($que->note); ?></td>
                                        <td><?php echo html_escape($que->date); ?></td>
                                        <td><?php echo html_escape($que->note_by); ?></td>
                                        <td><?php for($i=1;$i <=$que->number_of_star;$i++){
                                               echo "<span class='fa fa-star star_colour'></span>";
                                              } ?></td>
                                        <td><?php echo html_escape($que->status); ?></td>
                                        <td><?php echo html_escape($que->updated_by); ?></td>
                                        <td class="center">
                                        <?php if($this->permission->method('hrm','update')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/employe-performance-update/".html_escape($que->emp_per_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                         <?php endif; ?>
                                    
                                    <?php if($this->permission->method('hrm','delete')->access()): ?> 
                                        <a href="<?php echo base_url("hrm/employe-performance-delete/".html_escape($que->emp_per_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a> 
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
 
 