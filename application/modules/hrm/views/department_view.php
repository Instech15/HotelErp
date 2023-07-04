<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('manage_dept') ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered dt-responsive nowrap bootstrap4-styling">
                        <thead>
                            <tr>
                                <th><?php echo display('sl'); ?></th>
                                <th><?php echo display('department_name') ?></th>
                                <th><?php echo display('action') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mang)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($mang as $row) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($row->department_name); ?></td>
                                        <td class="center">

                                            <?php if ($this->permission->method('hrm', 'update')->access()) : ?>
                                                <a href="<?php echo base_url("hrm/department-update/" . html_escape($row->dept_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                            <?php endif; ?>

                                            <?php if ($this->permission->method('hrm', 'delete')->access()) : ?>
                                                <a href="<?php echo base_url("hrm/Department_controller/delete_dept/" . html_escape($row->dept_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-close"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $sl++; ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table> <!-- /.table-responsive -->
                </div>
                </div>
            </div>
        </div>
    </div>